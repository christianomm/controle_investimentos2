<?php
    require_once("../../dao/crud.php");
    
    class TipoProvento extends Crud{
        private $id;
        private $descricao;

        function __construct(){
            $this->table = "tipoprovento";
        }

        public function insert(){

            
            $sql = "INSERT INTO $this->table(descricao) VALUES(:descricao)";
            $stmt = Conexao::prepare($sql);
            
            $stmt->bindParam(':descricao',$this->getDescricao());
            
            
            return $stmt->execute();
        }
        public function update($id){
            echo "a imp´lementasr";
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

        /**
         * Get the value of descricao
         */ 
        public function getDescricao()
        {
                return $this->descricao;
        }

        /**
         * Set the value of descricao
         *
         * @return  self
         */ 
        public function setDescricao($descricao)
        {
                $this->descricao = $descricao;

                return $this;
        }
    }
?>