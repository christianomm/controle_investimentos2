<?php
require_once("conexao.php");
require_once("../model/Ordem.php");

class CarteiraDAO{
    public static $instance;
    public  $saldoOPDT=0;// testando DT
    
    private function __construct() {
        //
    }
    //************************************************************************************** */
    
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new CarteiraDAO();
 
        return self::$instance;
    }
    
    //************************************************************************************** */
    
    public function visualizaCarteira(){
        try {
            $sql = "SELECT * FROM carteira WHERE ativado=1 ORDER BY sigla";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll();//(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            //GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
        }
    }
    
    //************************************************************************************** */
    
    public function atualizaCarteira(Ordem $ordem){
        
        $temAtivo =  $this->verificaAtivo($ordem->getAtivo());
        $valorInvestido = $ordem->getValor() * $ordem->getQuantidade();

        if($temAtivo){
           
            try{
           
            //print_r($ordem);    
            $ativo =  $this->buscaAtivo($ordem->getAtivo());
            
            if(strtoupper($ordem->getOperacao())=="C"){

                
                $investimentoAnterior = $ativo["qtdeAtual"] * $ativo["pmAtual"];
                $investimentoAtual = $ordem->getValor() * $ordem->getQuantidade();
            
            //Calcula o valor total investido
                 $totalInvestido = $investimentoAnterior + $investimentoAtual;
            //Calcula o total de ativos
                $novaQtde = $ativo["qtdeAtual"] + $ordem->getQuantidade();
            //Calcula novo PM
                $novoPM = $totalInvestido/$novaQtde;

            //echo $novoPM."--".$novaQtde;

                if($ativo["qtdeAtual"]==0){
                    $sql = "UPDATE carteira SET qtdeAnterior=qtdeAtual, pmAnterior=pmAtual,
                    pmAtual=:novoPM, qtdeAtual=:novaQtde, ativado =1
                    where sigla=:sigla";

                }else{
                    $sql = "UPDATE carteira SET qtdeAnterior=qtdeAtual, pmAnterior=pmAtual,
                        pmAtual=:novoPM, qtdeAtual=:novaQtde 
                        where sigla=:sigla";
                }

            
                $p_sql = Conexao::getInstance()->prepare($sql);
                $p_sql->bindValue(":sigla", $ordem->getAtivo());
                $p_sql->bindValue(":novoPM",$novoPM);
                $p_sql->bindValue(":novaQtde",$novaQtde);
                
            
                return $p_sql->execute();
            //print_r($p_sql);
            // Para ordem de venda
            }elseif(strtoupper($ordem->getOperacao())=="V"){
                //print_r($ordem);
                $novaQtde = $ativo["qtdeAtual"] + ($ordem->getQuantidade());
                
                if($novaQtde==0){
                    $sql = "UPDATE carteira SET qtdeAnterior=qtdeAtual, qtdeAtual=:novaQtde, pmAtual=0, ativado=0 
                    where sigla=:sigla and tipoCarteira='N'";
                }else{
                    $sql = "UPDATE carteira SET qtdeAnterior=qtdeAtual, qtdeAtual=:novaQtde  
                    where sigla=:sigla and tipoCarteira='N'";
                }
                $p_sql = Conexao::getInstance()->prepare($sql);
                $p_sql->bindValue(":sigla", $ordem->getAtivo());
                $p_sql->bindValue(":novaQtde",$novaQtde);
                
                
                 // Calcula resultado em caso de venda

                //$resultado = new Resultado($ordem->getId(),);

                //$resultadoDAO = resultadoDAO:::getInstance();
                //$resultadDAO->cadastraResultado($resultado);
                return $p_sql->execute();
                

            //Operações com DayTrade
            }elseif($ordem->getOperacao()=="DT"){
                
                $novaQtde = $ativo["qtdeAtual"] + ($ordem->getQuantidade());
                

                

                if($novaQtde==0){
                    $sql = "UPDATE carteira SET qtdeAnterior=qtdeAtual, qtdeAtual=:novaQtde,pmAnterior=pmAtual, pmAtual=0, ativado=0 
                    where sigla=:sigla and tipoCarteira='DT'";
                    $p_sql = Conexao::getInstance()->prepare($sql);
                    $p_sql->bindValue(":sigla", $ordem->getAtivo());
                    $p_sql->bindValue(":novaQtde",$novaQtde);
                    return $p_sql->execute();

                }elseif($ordem->getQuantidade() > 0){
                    
                 $investimentoAnterior = $ativo["qtdeAtual"] * $ativo["pmAtual"];
                 $investimentoAtual = $ordem->getValor() * $ordem->getQuantidade();                
                    
                //Calcula o valor total investido
                     $totalInvestido = $investimentoAnterior + $investimentoAtual;
                //Calcula o total de ativos
                    $novaQtde = $ativo["qtdeAtual"] + $ordem->getQuantidade();
                //Calcula novo PM
                    $novoPM = $totalInvestido/$novaQtde;



                    $sql = "UPDATE carteira SET qtdeAnterior=0, pmAnterior=0,
                        pmAtual=:novoPM, qtdeAtual=:novaQtde,ativado=1
                        where sigla=:sigla and tipoCarteira='DT'";
                    
                    $p_sql = Conexao::getInstance()->prepare($sql);
                    $p_sql->bindValue(":sigla", $ordem->getAtivo());
                    $p_sql->bindValue(":novoPM",$novoPM);
                    $p_sql->bindValue(":novaQtde",$novaQtde);
                    return $p_sql->execute();



                }elseif($ordem->getQuantidade() < 0){

                    echo $ordem->getQuantidade();
                    
                    $sql = "UPDATE carteira SET qtdeAnterior=qtdeAtual, qtdeAtual=:novaQtde 
                    where sigla=:sigla and tipoCarteira='DT'";
                    

                    $p_sql = Conexao::getInstance()->prepare($sql);
                    $p_sql->bindValue(":sigla", $ordem->getAtivo());
                    $p_sql->bindValue(":novaQtde",$novaQtde);


                    return $p_sql->execute();
                }

                

                }//end if DT
                
                
                

                
           
            
            



            }catch(Excption $e){
                 print_r($e);
                }
            
            
            
        }
            
        else{
            if($ordem->getOperacao()=="DT"){
                $sql = "INSERT INTO carteira(       
                    sigla,
                    qtdeAtual,
                    pmAtual,
                    ativado,
                    tipoCarteira            
                    )
                    VALUES (
                    :sigla,
                    :qtdeAtual,
                    :pmAtual,
                    1,'DT')";
                
            }
            else{
                $sql = "INSERT INTO carteira(       
                    sigla,
                    qtdeAtual,
                    pmAtual,
                    ativado,
                    tipoCarteira            
                    )
                    VALUES (
                    :sigla,
                    :qtdeAtual,
                    :pmAtual,
                    1,'N')";
                
            }
           
            $valorInvestido = $ordem->getValor() * $ordem->getQuantidade();
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":sigla", $ordem->getAtivo());
            $p_sql->bindValue(":qtdeAtual", $ordem->getQuantidade());
            $p_sql->bindValue(":pmAtual", $ordem->getValor());
            
                 
            return $p_sql->execute();
        }
            
        
        
        
    }
    //************************************************************************************** */
    
    public function verificaAtivo($ativo){
        try {
            
            $sql = "SELECT count(*) as qtde FROM carteira where sigla='".$ativo."'";
           
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            $result = $p_sql->fetch();
           
            if($result["qtde"]>0)
                return true;
            else     
                return false;


        } catch (Exception $e) {

        }
    }
    public function buscaAtivo($ativo){
        try {
            
            $sql = "SELECT * FROM carteira where sigla='".$ativo."'";
           
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $result = $p_sql->fetch();
           
            


        } catch (Exception $e) {

        }


    }
    //************************************************************************************** */
    //Método: estaAtivado
    //@return true/false
    public function estaAtivado($sigla){
        $ativo = $this->buscaAtivo($sigla);

        
        if(!$ativo["ativado"])
            return false;
        else
            return true;
        
    }// end function

    //************************************************************************************** */
    public function getAtivo($ativo){
        $ativo = $this->buscaAtivo($ativo);

        $ativoCarteira = new Carteira($ativo["sigla"],$ativo["pmAtual"],$ativo["pmAnterior"],$ativo["qtdeAtual"],$ativo["qtdeAnterior"],$ativo["tipoCarteira"]);
        return $ativoCarteira;

    }
  

}
?>