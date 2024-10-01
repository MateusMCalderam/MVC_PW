<?php

require_once("config.php");
require_once("vendor/autoload.php");

$controller = new Controller\RetiradasController();

$destino = $_GET['destino'];

if (isset($destino)) {
    if ($destino == "form") {
        $controller->form();
    } elseif ($destino == "remove") {
        $controller->remove();
    } elseif ($destino == "save") {
        $controller->save();
    }
    else $controller->list();
}