<?php

require_once("conexao.php");

abstract class Crud extends Conexao{
    protected $table;

    abstract public function insert();
    abstract public function update($id);

    public function find($id){
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $sttmt = Conexao::prepare($sql);
        $sttmt->bindParam(':id',$id);
        $sttmt->execute();
        return $sttmt->fetch();
    }
    public function findAll(){
        $sql = "SELECT * FROM $this->table";
        $sttmt = Conexao::prepare($sql);
        $sttmt->bindParam(':id',$id);
        $sttmt->execute();
        return $sttmt->fetch();
    }

}


?>