<?php

require_once "../librerias/conexion.php";

class productoModel{

    private $conexion;
    function __costruct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor){
        
        $sql = $this->conexion->query("CALL insertproducto('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$id_categoria}','{$imagen}','{$id_proveedor}')");

        $sql = $sql->fetch_object();
        return $sql;
    }

}
//$arrProducto = $odjProducto->registrarProducto
?>
