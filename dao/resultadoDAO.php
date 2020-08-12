<?php
require_once("../model/Ordem.php");
require_once("../model/Carteira.php");
require_once("../model/Resultado.php");

class ResultadoDAO{
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ResultadoDAO();
 
        return self::$instance;
    }

    public function cadastraResultado(Ordem $ordem, Carteira $ativo_carteira){
        try{
            
            $resultado = $this->calculaResultado($ordem,$ativo_carteira);

            $sql = "INSERT INTO resultado (       
                idOrdem,
                lucro_prejuizo,
                    desempenho)
                VALUES (
                :idOrdem,
                :lucro_prejuizo,
                :desempenho)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":idOrdem", $resultado->getIdOrdem());
            $p_sql->bindValue(":lucro_prejuizo", $resultado->getLucro_prejuizo());
            $p_sql->bindValue(":desempenho", $resultado->getDesempenho());

            $p_sql->execute();
        }catch(Exception $e){
            
        }

    }
    public function calculaResultado(Ordem $ordem, Carteira $ativo_carteira){

        $lucro_prejuizo = abs($ordem->getQuantidade()) * ($ordem->getValor() - $ativo_carteira->getPmMedioAtual());
        $desempenho = (($ordem->getValor() / $ativo_carteira->getPmMedioAtual()) - 1) *100;

        $resultado = new Resultado($ordem->getId(),$lucro_prejuizo,$desempenho);

        return $resultado;
    }

}//end class