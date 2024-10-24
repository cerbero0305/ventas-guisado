<?php

require_once "../librerias/conexion.php";

class productoModel{

    private $conexion;
    function __costruct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoría, $imagen, $proveedor){
        
        $sql = $this->conexion->query("CALL nombredelprosedimientoalmacenado('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$categoría}','{$imagen}','{$proveedor}')");

        $sql = $sql->fetch_object();
        return $sql;
    }

}
//$arrProducto = $odjProducto->registrarProducto
?>
