<?php
require_once "../librerias/conexion.php";
class productoModel{
    private $conexion;
    function __costruct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function = obtener_Productos(){
        $arr_Respuesta = array();
        $Respuesta = $this->conexion->query("SELECT * FROM Producto");
        while ($objeto = $Respuesta->fetch_object()) {
            array_push($arr_Respuesta, $objeto);
        }
        return $arr_Respuesta;
    }

    public function registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor){
        $sql = $this->conexion->query("CALL insertproducto('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$id_categoria}','{$imagen}','{$id_proveedor}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
}
//$arrProducto = $odjProducto->registrarProducto

public function ver_producto(id){
    $sql = $this->conexion->query("SELECT * FROM producto WERE id = '$id'");
    $sql = $sql->fetch_object();
    return $sql;
}

?>
