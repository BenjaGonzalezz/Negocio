<?php

require_once "../modelo/modelo.php";

$funcion = $_GET['funcion'];

switch($funcion){
    case "guardarProducto":
        guardarProducto();
        break;
}

function guardarProducto(){
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $permalink = $_POST['link'];
    $thumbnail = $_POST['img'];
    $price = $_POST['price'];

    $producto = (new productos())->insertarProducto($id, $title, $permalink, $thumbnail, $price);
    echo json_encode($producto);
}

?>