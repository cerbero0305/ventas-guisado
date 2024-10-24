<?php
require_once "./config/config.php"

class Conexion{
    public static function connect(){
        $mysql = new mysqli(BD_HOST ,BD_user ,BD_PASSWORD , BD_NAME);
        $mysql->set_charset(BD_CHARSET);
        if (mysqli_connect_errno()) {
            echo "error de conexion: ".mysqli_connect_errno();
            
        }
        return $mysql;
    }
}

?>