<?php

class Carteira{
    private $ativo;
    private $pmMedioAtual;
    private $pmMedioAnterior;
    private $qtdeAtual;
    private $qtdeAnterior;
    private $estaAtivado; // default false;
    private $tipoCarteira;
    
    function __construct($ativo,$pmMedioAtual,$pmMedioAnterior,$qtdeAtual,$qtdeAnterior,$tipoCarteira){
        
        $this->setAtivo($ativo);
        
        $this->setPmMedioAtual($pmMedioAtual);
        $this->setPmMedioAnterior($pmMedioAnterior);
        $this->setQtdeAtual($qtdeAtual);
        $this->setQtdeAnterior($qtdeAnterior);
        $this->setTipoCarteira($tipoCarteira);
        
    }


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
     * Get the value of pmMedioAtual
     */ 
    public function getPmMedioAtual()
    {
        return $this->pmMedioAtual;
    }

    /**
     * Set the value of pmMedioAtual
     *
     * @return  self
     */ 
    public function setPmMedioAtual($pmMedioAtual)
    {
        $this->pmMedioAtual = $pmMedioAtual;

        return $this;
    }

    /**
     * Get the value of pmMedioAnterior
     */ 
    public function getPmMedioAnterior()
    {
        return $this->pmMedioAnterior;
    }

    /**
     * Set the value of pmMedioAnterior
     *
     * @return  self
     */ 
    public function setPmMedioAnterior($pmMedioAnterior)
    {
        $this->pmMedioAnterior = $pmMedioAnterior;

        return $this;
    }

    /**
     * Get the value of qtdeAtual
     */ 
    public function getQtdeAtual()
    {
        return $this->qtdeAtual;
    }

    /**
     * Set the value of qtdeAtual
     *
     * @return  self
     */ 
    public function setQtdeAtual($qtdeAtual)
    {
        $this->qtdeAtual = $qtdeAtual;

        return $this;
    }

    /**
     * Get the value of qtdeAnterior
     */ 
    public function getQtdeAnterior()
    {
        return $this->qtdeAnterior;
    }

    /**
     * Set the value of qtdeAnterior
     *
     * @return  self
     */ 
    public function setQtdeAnterior($qtdeAnterior)
    {
        $this->qtdeAnterior = $qtdeAnterior;

        return $this;
    }

    

    /**
     * Get the value of estaAtivado
     */ 
    public function getEstaAtivado()
    {
        return $this->estaAtivado;
    }

    /**
     * Set the value of estaAtivado
     *
     * @return  self
     */ 
    public function setEstaAtivado($estaAtivado)
    {
        $this->estaAtivado = $estaAtivado;

        return $this;
    }

    /**
     * Get the value of tipoCarteira
     */ 
    public function getTipoCarteira()
    {
        return $this->tipoCarteira;
    }

    /**
     * Set the value of tipoCarteira
     *
     * @return  self
     */ 
    public function setTipoCarteira($tipoCarteira)
    {
        $this->tipoCarteira = $tipoCarteira;

        return $this;
    }
}

?>