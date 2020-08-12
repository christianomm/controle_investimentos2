<?php

class Resultado{
    private $idOrdem;
    private $lucro_prejuizo;
    private $desempenho;




    function __construct($id,$lucro_prejuizo,$desempenho){
        $this->setIdOrdem($id);
        $this->setLucro_prejuizo($lucro_prejuizo);
        $this->setDesempenho($desempenho);
        
    }
    

    /**
     * Get the value of idOrdem
     */ 
    public function getIdOrdem()
    {
        return $this->idOrdem;
    }

    /**
     * Set the value of idOrdem
     *
     * @return  self
     */ 
    public function setIdOrdem($idOrdem)
    {
        $this->idOrdem = $idOrdem;

        return $this;
    }

    /**
     * Get the value of lucro_prejuizo
     */ 
    public function getLucro_prejuizo()
    {
        return $this->lucro_prejuizo;
    }

    /**
     * Set the value of lucro_prejuizo
     *
     * @return  self
     */ 
    public function setLucro_prejuizo($lucro_prejuizo)
    {
        $this->lucro_prejuizo = $lucro_prejuizo;

        return $this;
    }

    /**
     * Get the value of desempenho
     */ 
    public function getDesempenho()
    {
        return $this->desempenho;
    }

    /**
     * Set the value of desempenho
     *
     * @return  self
     */ 
    public function setDesempenho($desempenho)
    {
        $this->desempenho = $desempenho;

        return $this;
    }
}
?>