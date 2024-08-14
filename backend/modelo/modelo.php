<?php

require_once "../conexion/conexion.php";

class productos{

    function productoExiste($id) { // Función que verifica si un producto con un ID específico existe en la base de datos.
        $conection = conection();
        $sql = "SELECT id FROM productos WHERE id = '$id'";
        $resultado = $conection->query($sql);
        return $resultado->num_rows > 0;
    }

    function insertarProducto($id, $title, $permalink, $thumbnail, $price){

            $conection = conection();

            if ($this->productoExiste($id)) { // Verificar si el producto ya existe

                $this->actualizarProducto($id, $title, $permalink, $thumbnail, $price); // Si el producto existe, actualizar

            } else {
                // Si el producto no existe, inserta uno nuevo en la base de datos.
                $sql = "INSERT INTO productos VALUES ('$id', '$title', '$permalink', '$thumbnail', $price)";
                $respuesta = $conection->query($sql);
                return $respuesta;
            }
}

    // Función que actualiza un producto existente en la BD.
    function actualizarProducto($id, $title, $permalink, $thumbnail, $price){

        $conection = conection();
        $sql = "UPDATE productos SET titulo = '$title', permalink = '$permalink', thumbnail = '$thumbnail', price = '$price' WHERE id = '$id'";
        $respuesta = $conection->query($sql);
        return $respuesta;
}
}

?>