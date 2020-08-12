<?php
require_once("conexao.php");
require_once("../model/Ativo.php");

class AtivoDAO{
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new AtivoDAO();
 
        return self::$instance;
    }
    //Adiciona ativo 
    public function adicionaAtivo(Ativo $ativo){
        try{
            $sql = "INSERT INTO ativo (       
                sigla,
                CNPJ,
                descricao,
                classe)
                VALUES (
                :sigla,
                :CNPJ,
                :descricao,
                :classe)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":sigla", $ativo->getSigla());
            $p_sql->bindValue(":CNPJ", $ativo->getCNPJ());
            $p_sql->bindValue(":descricao", $ativo->getDescricao());
            $p_sql->bindValue(":classe", $ativo->getClasse());

            
            return $p_sql->execute();
            


        } catch(Exception $e){

        }
   }
   //Function: Adiciona ativos em lote
   public function adicionaAtivoLote($listaAtivos){
    try{
        foreach($listaAtivos as $ativo){
            $this->adicionaAtivo($ativo);
        }
        return true;
    }catch(Exception $e){
        return false;
    }
    

   }//end function

    public function listaAtivos(){
        try {
            $sql = "SELECT * FROM ativo ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll();//(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            //GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
        }

    }

}


?>