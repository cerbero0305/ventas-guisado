<?php
    require_once "../librerias/conexion.php";
class CompraModel{

    private $conexion;
    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrarCompra($idProducto, $cantidad, $precio, $fecha, $idPersona){
        // Orden de la base de datos
        $sql = $this->conexion->query("CALL registrar_compra('{$idProducto}', '{$cantidad}', '{$precio}', '{$fecha}', '{$idPersona}')");
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function obtener_compras(){
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM compras");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

}
?>