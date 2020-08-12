<?php
require_once("TipoProvento.php");
require_once("Proventos.php");

$prov = new Proventos();
$prov->setTipo(1);
$prov->setValor(120.00);
$prov->setIdAtivo("MGLU3");
$prov->setDtEX("2020-08-19");
$prov->setDtPagamento("2020-12-31");
$prov->insert();

//print_r($rs);

?>