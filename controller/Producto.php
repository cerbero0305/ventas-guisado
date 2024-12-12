<?php 
require_once('../model/productoModel.php');
require_once('../model/categoriaModel.php');
require_once('../model/PersonaModel.php');
$tipo = $_REQUEST['tipo'];
//instancio la clase modelo 
$odjProducto = new productoModel();
$odjCategoria = new categoriaModel();
$odjPersona = new personaModel();

// instancia la clases modeloProducto
if ($tipo == 'listar') {
    $arr_Respuesta = array('status'=>false, 'contenido'=>'');
    $arr_Productos = $objProducto->obtener_productos();
    if (!empty($arr_Productos)) {
        // Recorremos el array para agregar las opciones den las categorias
        for ($i=0; $i < count($arr_Productos); $i++) {
            $id_categoria = $arr_Productos[$i]->id_categoria;
            $r_categoria = $objCategoria->obtener_categoria($id_categoria);
            $arr_Productos[$i]->categoria=$r_categoria;

            $id_persona = $arr_Productos[$i]->id_proveedor;
            $r_persona = $objPersona->obtener_persona($id_persona);
            $arr_Productos[$i]->proveedor=$r_persona;

            $idProducto = $arr_Productos[$i]->id;
            $producto = $arr_Productos[$i]->nombre;
                                 //Redirigir al archivo editar-producto                                                  //Llamar a la funcion eliminar_producto()
            $opciones = '';
            $arr_Productos[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Productos;
    }
    echo json_encode($arr_Respuesta);
}

if ($tipo=="registrar") {
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

            //cargar archivos
            $archivo = $_FILES['imagen']['tmp_name'];
            $destino = '../assets/img_productos';
            $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
            $arrProducto = $odjProducto->registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor, $tipo_archivo);
            if ($arrProducto->id_n > 0) {
                $newid = $arrProducto->id_n;
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso.');
                $nombre = $arrProducto->id_n . "." . $tipo_archivo;
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
    }
    if ($tipo == "listarP") {
        $arr_Respuesta = array('status'=>false, 'contenido'=>'');
        $arr_Productos = $objProducto->obtener_productos();
        if (!empty($arr_Productos)) {
            // Recorremos el array para agregar las opciones den las categorias
            for ($i=0; $i < count($arr_Productos); $i++) {
                $idCategoria = $arr_Productos[$i]->id;
                $categoria = $arr_Productos[$i]->nombre;
                $opciones = '';
                $arr_Productos[$i]->options = $opciones;
            }
            $arr_Respuesta['status'] = true;
            $arr_Respuesta['contenido'] = $arr_Productos;
        }
        echo json_encode($arr_Respuesta);
    }

    if ($tipo == "ver") {
        $id_producto = $_POST['id_producto'];
        $arr_Respuesta = $odjProducto->verProducto($id_producto);
        if (empty($arr_Respuesta)) {
            $responde = array('status' => false, 'mensaje' => "Error, no hay producto");
        }else {
            $responde = array('status' => true, 'mensaje' => "datos encontrados", 'contenido' => $arr_Respuesta);
        }
        echo json_decode($responde);
    }

    if ($tipo=="actualizar") {
        $id_producto = $_POST['id_producto'];
        $imagen = $_POST['imagen'];
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $id_proveedor = $_POST['id_proveedor'];
        if ($nombre == "" || $detalle == "" || $precio == "" || $id_categoria == "" || $id_proveedor == "") {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacíos');
        } else {
            $arrProducto = $objProducto->actualizarProducto(
                $id_producto, $nombre, $detalle, $precio, $id_categoria, $id_proveedor);
                
            if ($arrProducto->p_id > 0) {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Actualizado Correctamente');
    
                if ($_FILES['imagen']['tmp_name'] != "") {
                    unlink('../assets/img_productos/' . $img);
                    $archivo = $_FILES['imagen']['tmp_name'];
                    $destino = '../assets/img_productos/';
                    $tipo_archivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
                    if (move_uploaded_file($archivo, $destino . '' . $id_producto . '.'. $tipo_archivo)) {
                    }
                }
            } else {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al actualizar producto');
            }
        }
        echo json_encode($arr_Respuesta);
    }

    if ($tipo == 'eliminar') {
        $id_producto = $_POST['id_producto'];
        $arrProducto = $odjProducto->eliminarProducto($id_producto);
        if (empty($arr_Respuesta)) {
            $response = array('status' => false);
        }else {
            $response = array('status' => true);
        }
        echo json_decode($response);
    }

?>