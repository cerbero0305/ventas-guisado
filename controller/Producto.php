<?php 
require_once('../model/productoModel.php');
require_once('../model/categoriaModel.php');
require_once('../model/personaModel.php');

//instancio la clase modelo 
$odjProducto = new productoModel();
$odjCategoria = new categoriaModel();
$odjPersona = new personaModel();

$tipo = $_REQUEST['tipo'];
// instancia la clases modeloProducto
if ($tipo="listar") {
    //respuesta
    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_Productos = $objProductos->obtener_Productos();
    if (!empty($arr_Productos)){
        //recorremos el array para agregar las opciones de las catagorias//
        for($i=0;$i < count($arr_Productos); $i++){

            $arr_categoria = $arr_Productos [$i]['categoria'];
            $objcategoria->obtener_categoria_id($id_categoria);
            $arr_Productos[$i]->categoria=$r_categoria;

            $id_producto =$arr_Productos[$i]->id;
            $id_producto = $arr_Productos[$i]->nombre;
            $opciones = '<a href="'.BASE_URL.'editarProducto/'.$id_producto.'">Editar</a><button onclick="eliminar_producto('.$id_producto.')">Eliminar</button>';
            $arr_Productos[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Productos; 
    }
    echo json_encode($arr_Respuesta);
}

if ($tipo=="registrar") {
    //print_r($_POST);
    /*cho &_filles['imagen']['tmp_mane'];
    $archivo = $_FILES['imagen']['tmp_name'];
    $destino = './assetsi/img_productos/';
    $tipoArchivo =  strtolower(pathinfo($_FILES['portada']['name'], PATHIFO_))*/
     if ($_POST)
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

            //cargar archivos
            $archivo = $_FILES['imagen']['tmp_name'];
            $destino = '../assets/img_productos/';
            $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
            
            $arrProducto = $odjProducto->registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor);
            if ($arrProducto->id > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitosp');
                
                if (move_uploaded_file($archivo, $destino . '' . $nombre)) {
                } else {
                    $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso, error al subir imagen');
                }

            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
            }
            echo json_encode($arr_Respuesta);
        }
    }
    if ($tipo == "listar") {
    }

    if ($tipo=="ver") {
        $id_producto = $_POST['id_producto'];
        $arrProducto = $odjProducto->verProducto($id_producto);
        if (empty(arr_Respuesta)) {
            $response = array('status' => false, 'mensaje' => "Error, no hay producto");
        }else {
            $response = array('status' => true, 'mensaje' => "datos encontrados", 'contenido' => $arr_Respuesta);
        }
        echo json_decode($arr_Respuesta);
    }

    if ($tipo=="actualizar") {
    }

    if ($tipo=="eliminar") {
    }

?>