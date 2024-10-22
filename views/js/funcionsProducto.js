async function registrar_producto() {
    let codigo = document.getElementById('codigo').value;
    let nombre = document.querySelector('#nombre').value;
    let detalle = document.getElementById('detalle').value;
    let precio = document.getElementById('precio').value;
    let stock = document.getElementById('stock').value;
    let categoría = document.getElementById('categoría').value;
    let imagen = document.getElementById('imagen').value;
    let proveedor = document.getElementById('proveedor').value;

    if (codigo == "" || nombre == "" || detalle  == "" || precio == "" ||  stock == "" || categoría == "" || imagen == "" || proveedor == "") {
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

