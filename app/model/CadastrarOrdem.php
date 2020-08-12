<?php
require_once("../../dao/conexao.php");

require_once("../../dao/ordemDAO.php");
require_once("../../dao/resultadoDAO.php");

require_once("Ordem.php");

$file = file("ordemDT.txt");
$ordemDAO = ordemDAO::getInstance();
$dados = null;
//
foreach($file as $line){
  $dados = explode("\t", $line);
  $dtOrdem = date("Y-m-d",strtotime(str_replace('/','-',$dados[1])));
  $id = $dtOrdem."-".rand(1,5000000);

  
  $ordem = new ordem($id,$dados[0],$dtOrdem,$dados[2],$dados[3],$dados[4]);
  echo "Antes de atualizar";
  //print_r($ordem);
  //echo "<br>";
  
  if($ordemDAO->adicionaOrdem($ordem)){
  //Atualiza carteira de ativos
        $carteira = carteiraDAO::getInstance();
        $resultado = resultadoDAO::getInstance();

        
        
        if($ordem->getQuantidade()<0 && $carteira->estaAtivado($ordem->getAtivo())){
          $ativoCarteira = $carteira->getAtivo($ordem->getAtivo());
          $resultado->cadastraResultado($ordem, $ativoCarteira);
          //echo "calcula res";

        }
        $carteira->atualizaCarteira($ordem);
        
        
    }
    
  }




?>