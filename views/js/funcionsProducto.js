async function listar_productos() {
    try {
        let respuesta = await fetch(base_url+'controller/Producto.php?tipo=listar');
        let json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let cont = 0;
            datos.forEach(item => {
                let nueva_fila = document.createElement('tr');
                //el primer id es del elemento asignado y el segundo id es de la base de datos
                nueva_fila.id = "fila"+item.id;
                cont++;
                nueva_fila.innerHTML = `
                        <th>${cont}</th>
                        <td>${item.codigo}</td>
                        <td>${item.nombre}</td>
                        <td>${item.precio}</td>
                        <td>${item.stock}</td>
                        <td>${item.id_categoria.nombre}</td>
                        <td>${item.proveedor.razon_social}</td>
                        <td>${item.opciones}</td>
                        <td></td>
                `;
                document.querySelector('#tbl_producto').appendChild(nueva_fila);
            });
        }
        console.log(json);
    } catch (error) {
        console.log("Oops salio un error"+ error);
    }
}

if (document.querySelector('#tbl_productos')) {
    listar_productos();
}

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
        const datos = new FormData(formInsertProducto);
        //enviar datos hacia el controlador
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=registrar',{
            method: 'POST',
            mede: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json =  await respuesta.json();
        if (json.status) {
            swal("Registro", json.mensaje,"succes");
        }else{
            swal("Registro", json.mensaje,"error");
        }
        console.log(json);
        //console.log(respuesta);
    } catch (e) {
        console.log("Oop, ocurrio un error" + e);
    }
}

async function listar_proveedor() {
    try{
        let respuesta = await fetch(base_url +'controller/proveedor.php?tipo=listar');
        console.log(respuesta);
       json = await respuesta.json();
       if(json.status){
        let datos = json.contenido;
        let contenido_select = '<option value="" disabled selected>Seleccione</option>';
        datos.forEach(element => {
            contenido_select += '<option value="' + element.id +'">' + element.razon_social + '</option>';
        });
        document.getElementById('id_proveedor').innerHTML = contenido_select;
    }
     console.log(respuesta);
    }catch (e) {
        console.log("Error al cargar proveedor" + e);
    }
}

async function listar_productos() {
    try {
        let respuesta = await fetch(base_url + '/controller/Producto.php?tipo=listarP');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="" disabled selected>Seleccione</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.nombre + '</option>';
            });
            document.getElementById('id_producto').innerHTML = contenido_select;
        }
        console.log(respuesta);
    }catch(e){
        console.log("Error al cargar productos." + e);
    }
}

async function ver_producto(id) {
    const formData = new FormData();
    formData.append('id_producto', id);
    try {
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=ver', {
            method: 'POST',
            mede: 'cors',
            cache: 'no-cache',
            body: formData
        });
        json = await respuesta.json();
        if (json.status) {
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#Nombre').value = json.contenido.Nombre;
            document.querySelector('#Detalle').value = json.contenido.Detalle;
            document.querySelector('#precio').value = json.contenido.precio;
            document.querySelector('#id_categoria').value = json.contenido.id_categoria;
            document.querySelector('#id_proveedor').value = json.contenido.id_proveedor;
        } else {
            window.location = base_url + "verProducto";
        }
        console.log(json);
    } catch (error) {
        console.log("Oop ocurrio un error" + error);
    }
}

async function actualizar_producto() {
    const datos = new FormData(formUpdateProducto);
    try {
        let respuesta = await fetch(base_url + '/controller/Producto.php?tipo=actualizar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("Registro", json.mensaje, "success");
        } else {
            swal("Registro", json.mensaje, "error");
        }
        console.log(json);
    } catch (e) {

    }
}

async function eliminar_producto(id) {
    swal({
        title: "Estás seguro de que quieres eliminar este producto?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then((willDelete)=>{
        if (willDelete) {
            fnt_eliminar(id);
        }
    })
}

async function fnt_eliminar(id) {
    const formdata = new FormData();
    formdata.append('id_producto',id);
    try {
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=eliminar',{
            method: 'POST',
            mede: 'cors',
            cache: 'no-cache',
            body: formData
        });
        json = await respuesta.json();
        if (json.status) {
            swal("Eliminar", "eliminado correctamente", "success");
            document.querySelector('#fila'+id).rimove();
        } else{
            swal('Eliminar', 'Error al eliminar', 'warning'); 
        }
    } catch (error) {
        console.log("Ocurrio un error" + error);
    }
}