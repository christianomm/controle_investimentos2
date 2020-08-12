<?php
require_once("../../dao/conexao.php");
require_once("../../dao/ativoDAO.php");
require_once("Ativo.php");


$fileAtivos = file("dados.txt");
$ativoDAO = AtivoDAO::getInstance();

foreach($fileAtivos as $line_ativo){
   $dados = explode(">", $line_ativo);
   
   $ativo = new Ativo($dados[0],$dados[3],$dados[2],$dados[1]);
   $e = $ativoDAO->adicionaAtivo($ativo);

    print_r($e);
}

//$ativo = new Ativo();
//print_r($fileAtivos);






/*
$listaAtivos= $ativoDAO->listaAtivos();
foreach($listaAtivos as $ativo ){
  //print_r($ativo);
  echo $ativo["CNPJ"]."<BR>";
}
//print_r($rs);
//$listaAtvios = $_GET[]
*/


?>