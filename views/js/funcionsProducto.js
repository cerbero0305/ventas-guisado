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
                        <td>${item.stock}</td>
                        <td>${item.id_categoria.nombre}</td>
                        <td>${item.id_proveedor}</td>
                        <td>${item.opciones}</td>
                `;
                Document.querySelector('#tbl_productos').appendChild(nueva_fila);
            });
        }
        console.log(json);
    } catch (error) {
        console.log("Oops salio un error"+ error);
    }
}

if (document.querySelector('#tbl_productos')) {
    
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
        const datos = new FormData(frmRegistrar);
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

async function listar_categorias() {
    try{
        let respuesta = await fetch(base_url +'controller/Categoria.php?tipo=listar');
        console.log(respuesta);
       json = await respuesta.json();

       if(json.status){
        let datos = json.contenido;
        let contenido_select = '<option value="">Seleccione</option>';
        datos.forEach(element => {
            contenido_select += '<option value="' + element.id +'">' + element.nombre + '</option>';
           /* $('#categoria').append($('<option />',{
                text: ${element.nombre},
                value:  ${element.id},

            }));*/
        });

        document.getElementById('categoria').innerHTML = contenido_select;

    }
     console.log(respuesta);
    }catch (e) {
        console.log("Error al cargar categorias" + e);
    } 
}

async function listar_proveedor() {
    try{
        let respuesta = await fetch(base_url +'controller/proveedor.php?tipo=listar');
        console.log(respuesta);
       json = await respuesta.json();
       if(json.status){
        let datos = json.contenido;
        let contenido_select = '<option value="">Seleccione</option>';
        datos.forEach(element => {
            contenido_select += '<option value="' + element.id +'">' + element.razon_social + '</option>';
           
        });
        document.getElementById('proveedor').innerHTML = contenido_select;
    }
     console.log(respuesta);
    }catch (e) {
        console.log("Error al cargar proveedor" + e);
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
            body: 'formData'
        });
        json = await respuesta.json();
        if (json.status) {
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#Nombre').value = json.contenido.Nombre;
            document.querySelector('#Detalle').value = json.contenido.Detalle;
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#codigo').value = json.contenido.codigo;
        } else {
            window.location = base_url+"productos";
        }
        console.log(json);
    } catch (error) {
        console.log("Oop ocurrio un error" + error);
    }
}