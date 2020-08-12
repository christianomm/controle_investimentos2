<?php
    require_once("../../dao/crud.php");

    class Proventos extends Crud{
        private $id;
        private $tipo;
        private $valor;
        private $idAtivo;
        private $dtEx;
        private $dtPagamento;

        function __construct(){
            $this->table = "proventos";
        }
        /**
         * Get the value of id
         */ 
        
        public function insert(){
             
            $sql = "INSERT INTO $this->table(tipo,valor,idAtivo,dtEX,dtPagamento) VALUES(:tipo,:valor,:idAtivo,:dtEX,:dtPagamento)";
            $stmt = Conexao::prepare($sql);
            
            $stmt->bindParam(':tipo',$this->getTipo());
            $stmt->bindParam(':valor',$this->getValor());
            $stmt->bindParam(':idAtivo',$this->getIdAtivo());
            $stmt->bindParam(':dtEX',$this->getDtEX());
            $stmt->bindParam(':dtPagamento',$this->getDtPagamento());
            return $stmt->execute();

        }
        public function update($id){
            //
        }
        
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

        /**
         * Get the value of tipo
         */ 
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         *
         * @return  self
         */ 
        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

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
                $this->valor = $valor;

                return $this;
        }

        /**
         * Get the value of idAtivo
         */ 
        public function getIdAtivo()
        {
                return $this->idAtivo;
        }

        /**
         * Set the value of idAtivo
         *
         * @return  self
         */ 
        public function setIdAtivo($idAtivo)
        {
                $this->idAtivo = $idAtivo;

                return $this;
        }

        /**
         * Get the value of dtEx
         */ 
        public function getDtEx()
        {
                return $this->dtEx;
        }

        /**
         * Set the value of dtEx
         *
         * @return  self
         */ 
        public function setDtEx($dtEx)
        {
                $this->dtEx = $dtEx;

                return $this;
        }

        /**
         * Get the value of dtPagamento
         */ 
        public function getDtPagamento()
        {
                return $this->dtPagamento;
        }

        /**
         * Set the value of dtPagamento
         *
         * @return  self
         */ 
        public function setDtPagamento($dtPagamento)
        {
                $this->dtPagamento = $dtPagamento;

                return $this;
        }
    }
    


?>