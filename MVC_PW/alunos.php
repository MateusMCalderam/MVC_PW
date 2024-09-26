<?php

require_once("config.php");
require_once("vendor/autoload.php");


$destino = $_GET['destino'];


if (isset($destino)) {
    
}

$controller = new Controller\AlunosController();
$controller->list();