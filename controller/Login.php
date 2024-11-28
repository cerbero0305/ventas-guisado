<?php
require_once('../model/personaModel.php');
$objPersona = new PersonaModel();
$tipo = $_GET['tipo'];

if ($tipo=="iniciar_sesion") {
    //print_r($_POST);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $arrResponde = array('status'=> false, 'msg'=>'');
    $arrPersona = $objPersona->buscarPersonaPorDNI($usuario);
    //print_r($arrPersona);
    if (empty($arrPersona)) {
        $arrResponde = array('status'=> false, 'msg'=>'Error, usuario no esta registrado en  el sistema');
    }else {
        if (password_verify($password, $arrPersona->password)) {
            sesision_start();
            $_SESSION['sesion_ventas_id'] = $arrPersona->id;
            $_SESSION['sesion_ventas_dni'] = $arrPersona-> nro_identidad;
            $_SESSION['sesion_ventas_nombre'] = $arrPersona-> razon_social;
            $arrResponde = array('status'=> false, 'msg'=>'ingresar al sistema');
        }else {
            $arrResponde = array('status'=> false, 'msg'=>'Error, comtraseña Incorrecta');
        }
    }
    echo json_decode($arrResponde);
}

if ($tipo == "cerrar_sesion") {
    session_start();
    session_unset();
    session_destroy();
    $arrResponde = array('status' => true);
    echo json_decode($arrPersona);
}
die;
?>