<?php

class Ordem{
    private $id;
    private $ativo;
    private $operacao;
    private $quantidade;
    private $valor;
    private $data;

    function __construct($id,$ativo,$data,$operação,$quantidade,$valor){
        $this->setId($id);
        $this->setAtivo($ativo);
        $this->setData($data);
        $this->setOperacao($operação);
        $this->setQuantidade($quantidade);
        $this->setValor($valor);
        
    }

    //Getters and Setters
    

    /**
     * Get the value of ativo
     */ 
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */ 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get the value of operacao
     */ 
    public function getOperacao()
    {
        return $this->operacao;
    }

    /**
     * Set the value of operacao
     *
     * @return  self
     */ 
    public function setOperacao($operacao)
    {
        $this->operacao = $operacao;

        return $this;
    }

    /**
     * Get the value of quantidade
     */ 
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @return  self
     */ 
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        
        $this->valor = str_replace(",",".",$valor);

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
?>