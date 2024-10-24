<?php 
require_once('../model/productoModel.php');
$tipo = $_REQUEST['tipo'];

// instancia la clases modeloProducto
$odjProducto = new productoModel();

if ($tipo=="registrar") {
    //print_r($_POST);
    if ($_POST) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $id_categoria = $_POST['id_categoria'];
        $imagen = $_POST['imagen'];
        $id_proveedor = $_POST['id_proveedor'];
        
        if ($codigo == "" || $nombre == "" || $detalle  == "" || $precio == "" ||  $stock == "" || $id_categoria == "" || $imagen == "" || $id_proveedor == "") {

            $arr_Respuesta = array('status'=>false,'mensaje'=>'Error, campos vacíos');

        } else {

            $arrProducto = $odjProducto->registrarProducto ($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor);

            if ($arrProducto->id>0) {
                $arr_Respuesta = array('status'=>true,'mensaje'=>'Registro Exitosp');
            } else {
                $arr_Respuesta = array('status'=>false,'mensaje'=>'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }
}
?>