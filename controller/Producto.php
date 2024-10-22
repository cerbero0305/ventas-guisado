<?php 
require_once('./model/productoModel.php');
$tipo = $_REQUEST['tipo'];

// instancia la clases modeloProducto
$odjProducto = new productoModel();

if ($tipo=="registrar") {
    //print_r($_POST);
    if ($_POST) {
        $codigo = $_POST['codigo']
        $nombre = $_POST['nombre']
        $detalle = $_POST['detalle']
        $precio = $_POST['precio']
        $stock = $_POST['stock']
        $categoría = $_POST['categoría']
        $imagen = $_POST['imagen']
        $proveedor = $_POST['proveedor']
        if ($codigo == "" || $nombre == "" || $detalle  == "" || $precio == "" ||  $stock == "" || $categoría == "" || $imagen == "" || $proveedor == "") {
            $arr_Respuesta = array('status'=>false,'mensaje'=>'Error, campos vacíos');
        } else {
            $arrProducto = $odjProducto->registrarProducto ($codigo, $nombre, $detalle, $precio, $stock, $categoría, $imagen, $proveedor);
        }
    }
}
?>