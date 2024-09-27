<?php

require_once("config.php");
require_once("vendor/autoload.php");

$controller = new Controller\AlunosController();

$destino = $_GET['destino'];

if (isset($destino)) {
    if ($destino == "form") {
        $controller->form();
    }
    else $controller->list();
}

