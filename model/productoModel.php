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
        $Respuesta = $this->conexion->query("SELECT * FROM producto");
        while ($objeto = $Respuesta->fetch_object()) {
            array_push($arr_Respuesta, $objeto);
        }
        return $arr_Respuesta;
    }

    public function registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor, $tipo_archivo){
        $sql = $this->conexion->query("CALL insertproducto('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$id_categoria}','{$imagen}','{$id_proveedor}','{$tipo_archivo}')");
        $sql = $sql->fetch_object();
        return $sql;
    }


public function actualizarProducto($id, $nombre, $detalle, $precio, $id_categoria, $id_proveedor){
    $sql = $this->conexion->query("CALL actualizarproducto('{$id}','{$nombre}','{$detalle}','{$precio}','{$id_categoria}', '{$id_proveedor}')");
    $sql = $sql->fetch_object();
    return $sql;
}

public function actualizar_imagen($id, $imagen){
    $sql = $this->conexion->query("UPDATE producto SET imagen = '{$imagen}' WHERE id = '{$id}'");
    return 1;
}

//$arrProducto = $odjProducto->registrarProducto

public function obtener_producto_id($id)
    {
        $respuesta = $this->conexion->query("SELECT nombre FROM producto WHERE id = '{$id}'");
        $objeto = $respuesta->fetch_object();
        return $objeto;
    }

public function ver_producto(id){
    $sql = $this->conexion->query("SELECT * FROM producto WERE id = '$id'");
    $sql = $sql->fetch_object();
    return $sql;
}

public function eliminarproducto($id){
    $sql = $this->conexion->query("CALL eliminarproducto('{$id}')");
    $sql = $sql->fetch_object();
    return $sql;
}
}
?>