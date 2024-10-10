<?php
    class vistaModelo{
        protected static function obtener_vistas($vista){
            $nombres_permitidos = ['inicio', 'tendencias', 'youtube', 'musica', 'yo', 'informacion', 'buscar'];
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