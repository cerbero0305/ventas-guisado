<?php
    require_once "../librerias/conexion.php";
    class PersonaModel{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }
        // Todas las personas
        public function obtener_personas(){
            $arrRespuesta = array();
            $respuesta = $this->conexion->query("SELECT * FROM persona WHERE rol = 'Cliente' ");
            while ($objeto = $respuesta->fetch_object()) {
                array_push($arrRespuesta, $objeto);
            }
            return $arrRespuesta;
        }

        public function obtener_personas_admin(){
            $arrRespuesta = array();
            $respuesta = $this->conexion->query("SELECT * FROM persona");
            while ($objeto = $respuesta->fetch_object()) {
                array_push($arrRespuesta, $objeto);
            }
            return $arrRespuesta;
        }

        // Por ID
        public function obtener_persona($id){
            $respuesta = $this->conexion->query("SELECT * FROM persona WHERE id='{$id}'");
            $objeto = $respuesta->fetch_object();
            return $objeto;
        }

        public function registrarPersona($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password, $estado, $fecha_reg){
            // Orden de la base de datos
            $sql = $this->conexion->query("CALL insertpersona('{$nro_identidad}', '{$razon_social}', '{$telefono}', '{$correo}', '{$departamento}', '{$provincia}', '{$distrito}', '{$cod_postal}', '{$direccion}', '{$rol}', '{$password}', '{$estado}', '{$fecha_reg}')");
            $sql = $sql->fetch_object();
            return $sql;
        }

        //
        public function buscarPersonaPorDNI($password){
            $sql = $this->conexion->query("SELECT*FROM persona WHERE nro_identidad = '{$password}'");
            $sql = $sql->fetch_object();
            return $sql;
        }
    }

    class proveedorModel{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->connect();
        }
        // OBTENER PROVEEDORES
        public function obtener_proveedores(){
            $arrRespuesta = array();
            $respuesta = $this->conexion->query("SELECT * FROM persona WHERE rol = 'Proveedor' ");
            while ($objeto = $respuesta->fetch_object()) {
                array_push($arrRespuesta, $objeto);
            }
            return $arrRespuesta;
        }
    }
?>