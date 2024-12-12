<?php 
require_once('../model/PersonaModel.php');
$tipo = $_REQUEST['tipo'];
// instancia la clases modeloProducto
$odjProducto = new PersonaModel();

if ($tipo == 'listar') {
    //respuesta
    $arr_Respuesta = array('status'=>false, 'contenido'=>'');
    $arr_Personas = $objPersona->obtener_personas();
    if (!empty($arr_Personas)) {
        // Recorremos el array para agregar las opciones den las categorias
        for ($i=0; $i < count($arr_Personas); $i++) {
            $idPersona = $arr_Personas[$i]->id;
            $persona = $arr_Personas[$i]->razon_social;
            $opciones = '';
            $arr_Personas[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Personas;
    }
    echo json_encode($arr_Respuesta);
}

if ($tipo == 'listarAdmin') {
    $arr_Respuesta = array('status'=>false, 'contenido'=>'');
    $arr_Personas = $objPersona->obtener_personas_admin();
    if (!empty($arr_Personas)) {
        // Recorremos el array para agregar las opciones de las categorias
        for ($i=0; $i < count($arr_Personas); $i++) {
            $idPersona = $arr_Personas[$i]->id;
            $persona = $arr_Personas[$i]->razon_social;
            $opciones = '';
            $arr_Personas[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Personas;
    }
    echo json_encode($arr_Respuesta);
}

// Registrar PERSONA
if ($tipo == 'registrar') { 
    if ($_POST) {
        $nro_identidad = $_POST['nro_identidad'];
        $razon_social = $_POST['razon_social'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $departamento = $_POST['departamento'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $cod_postal = $_POST['cod_postal'];
        $direccion = $_POST['direccion'];
        $rol = $_POST['rol'];
        $contraseña = $_POST['nro_identidad'];
        $estado = $_POST['estado'];
        $fecha_reg = $_POST['fecha_reg'];
        
        // Validación de campos vacíos
        if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "" || $contraseña == "" || $estado == "" || $fecha_reg == "") {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacíos');
        } else {
            // Hashear la contraseña
            //$contraseñaHasheada = md5($contraseña);
            // Hashear Forma Anibal
            $contraseñaHasheada = password_hash($contraseña, PASSWORD_DEFAULT);

            // Guardar los datos en la base de datos, incluyendo la contraseña hasheada
            $arrPersona = $objPersona->registrarPersona(
                $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $contraseñaHasheada, $estado, $fecha_reg);

            if ($arrPersona->id > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro exitoso.');
            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar persona.');
            }
            // Enviar la respuesta como JSON
            echo json_encode($arr_Respuesta);
        }
    }
}
?>