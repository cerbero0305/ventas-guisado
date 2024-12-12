async function registrarCompra() {
    let id_producto = document.getElementById('id_producto').value;
    let cantidad = document.querySelector('#cantidad').value;
    let precio = document.querySelector('#precio').value;
    let id_trabajador = document.querySelector('#id_trabajador').value;
    
    if (id_producto == "" || cantidad == "" || precio == "" || id_trabajador == "") {
        alert("Error, campos vacíos");
        return;
    }
    try {
        // Capturar los datos del formulario y guardarlos en la constante "datos"
        const datos = new FormData(formInsertCompra);
        let respuesta = await fetch(base_url + '/controller/Compra.php?tipo=registrar',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("Registro", json.mensaje, "success");
        }else{
            swal("Registro", json.mensaje, "error");
        }

        console.log(json);
    } catch (e) {
        console.log("Ups, ocurrió un error" + e);
    }
}

async function listar() {
    try {
        let respuesta = await fetch(base_url + '/controller/Compra.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let cont = 0;
            datos.forEach(item => {
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + item.id;
                cont++;
                nueva_fila.innerHTML = `
                    <th>${cont}</th>
                    <td>${item.producto.nombre}</td>
                    <td>${item.cantidad}</td>
                    <td>${item.precio}</td>
                    <td>${item.persona.razon_social}</td>
                    <td>${item.codigo}</td>
                    <td></td>
                `;
                document.querySelector('#tbl_compra').appendChild(nueva_fila);
            });
        }
        console.log(json);
    } catch (e) {
        console.log("Ups, ocurrió un error " + e);
    }
}

if (document.querySelector('#tbl_compra')) {
    listar();
}