<?php

require_once "../modelo/modelo.php";

$funcion = $_GET['funcion'];

switch($funcion){
    case "guardarProducto":
        guardarProducto();
        break;
}

function guardarProducto(){
}

?>