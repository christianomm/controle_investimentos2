<?php
require_once("conexao.php");
require_once("../model/Ordem.php");
require_once("CarteiraDAO.php");

class OrdemDAO{
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new OrdemDAO();
 
        return self::$instance;
    }
    //Adiciona ativo 
    public function adicionaOrdem(Ordem $ordem){
        try{
            $sql = "INSERT INTO ordem (       
                id,
                sigla,
                dt_op,
                operacao,
                quantidade,
                valor)
                VALUES (
                :id,
                :sigla,
                :dt_op,
                :operacao,
                :quantidade,
                :valor)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $ordem->getId());
            $p_sql->bindValue(":sigla", $ordem->getAtivo());
            $p_sql->bindValue(":dt_op", $ordem->getData());
            $p_sql->bindValue(":operacao", $ordem->getOperacao());
            $p_sql->bindValue(":quantidade", $ordem->getQuantidade());
            $p_sql->bindValue(":valor", $ordem->getValor());

           // print_r($p_sql);
            if($p_sql->execute())
                return true;
            
        } catch(Exception $e){
            echo $e;
        }
   }
   //Function: Adiciona ativos em lote
   public function adicionaOrdemLote($listaOrdens){
    try{
        foreach($listaOrdens as $ordem){
            $this->adicionaOrdem($ordem);
        }
        return true;
    }catch(Exception $e){
        return false;
    }
    

   }//end function
}//end class
?>