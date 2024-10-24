async function registrar_producto() {
    let codigo = document.getElementById('codigo').value;
    //let nombre = document.querySelector('#nombre').value;
    let nombre = document.getElementById('nombre').value;
    let detalle = document.getElementById('detalle').value;
    let precio = document.getElementById('precio').value;
    let stock = document.getElementById('stock').value;
    let id_categoria = document.getElementById('id_categoria').value;
    let imagen = document.getElementById('imagen').value;
    let id_proveedor = document.getElementById('id_proveedor').value;

    if (codigo == "" || nombre == "" || detalle  == "" || precio == "" ||  stock == "" || id_categoria == "" || imagen == "" || id_proveedor == "") {
        alert("error, compos vasios");
        return;
    }
    try {
        // capturamos datos del formulario
        const datos = new FormData(frmRegistrar);
        //enviar datos hacia el controlador
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=registrar',{
            method: 'POST',
            mede: 'cors',
            cache: 'no-cache',
            body: datos
        });

        console.log(respuesta);

    } catch (e) {
        console.log("Oop, ocurrio un error" + e);
    }
}

