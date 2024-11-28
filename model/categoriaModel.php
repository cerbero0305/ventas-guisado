<?php
require_once "../librerias/conexion.php";

class categoriaModel{
    private $conexion;
    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function obtener_categorias(){
        $arr_Respuesta = array();
        $Respuesta = $this->conexion->query("SELECT * FROM categoria");
        while ($objeto = $Respuesta->fetch_object()) {
            array_push($arr_Respuesta, $objeto);
        }
        return $arr_Respuesta;
    }

    public function obtener_categoria($id){
        $Respuesta = $this->query("SELECT * FROM categoria WHERE id = '{$id}'");
        $objeto = $Respuesta->fetch_object();
        return $objeto;
    }

    public function registrarCategoria($nombre, $detalle){
        // Orden de la base de datos
        $sql = $this->conexion->query("CALL insertcategoria('{$nombre}', '{$detalle}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
}
?>