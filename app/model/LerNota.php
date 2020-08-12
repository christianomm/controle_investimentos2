<?php
//require_once("../../dao/conexao.php");
//require_once("../../dao/ordemDAO.php");
//require_once("Ordem.php");

$file = file("dados/nota.pdf");
foreach($file as $line){
    echo $line;
}