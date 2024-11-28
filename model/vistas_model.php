<?php
session_start();
    class vistaModelo{
        protected static function obtener_vistas($vista){
            $nombres_permitidos = ['inicio', 'tendencias', 'youtube', 'musica', 'yo', 'informacion', 'buscar','ingresarNuevoProducto','productos','ingresarCompras','editarProducto','ingresarCategoria','verCategoria','ingreserPersona','verPersona'];
            /*if (!isset($_SESSION['sesion_ventas_id'])) {
                return "login";
            }*/
            if (in_array($vista, $nombres_permitidos)) {
                if (is_file("./views/".$vista.".php")) {
                    $contenido = "./views/".$vista.".php";
                }else {
                    $contenido = "404";
                }
            }elseif ($vista=="login" || $vista=="index") {
                $contenido = "login";
            }else {
                $contenido = "404";
            }
            return $contenido;
        }
    }
?>