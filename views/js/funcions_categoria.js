async function registrarCategoria() {
    let nombre = document.getElementById('nombre').value;
    let detalle = document.querySelector('#detalle').value;
    
    if (nombre == "" || detalle == "") {
        alert("Error, campos vacíos");
        return;
    }
// Mostrar error en caso de codigo roto
    try {
        // Capturar los datos del formulario y guardarlos en la constante "datos"
        const datos = new FormData(formInsertCategoria);
        // Enviar datos hacia el controlador
        let respuesta = await fetch(base_url + '/controller/Categoria.php?tipo=registrar',{
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

async function listar_categorias() {
    try {
        let respuesta = await fetch(base_url + '/controller/Categoria.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="" disabled selected>Seleccione</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.nombre + '</option>';

                // Para trabajar con jquery
                /*$('#idCategoria').append($('<option />', {
                    text: `${element.nombre}` ,
                    value: `${element.id}`
                }));*/

            });
            document.getElementById('id_categoria').innerHTML = contenido_select;
        }
        console.log(respuesta);
    }catch(e){
        console.log("Error al cargar las categorias." + e);
    }
}

async function listar_categorias_admin() {
    try {
        let respuesta = await fetch(base_url + '/controller/Categoria.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let cont = 0;
            datos.forEach(item => {
                let nueva_fila = document.createElement("tr");
                // "nueva_fila.id" = id de la nueva fila, "item.id" = id de la base de datos(producto)
                nueva_fila.id = "fila" + item.id;
                cont++;
                nueva_fila.innerHTML = `
                    <th>${cont}</th>
                    <td>${item.nombre}</td>
                    <td>${item.detalle}</td>
                    <td>${item.nro_identidad}</td>
                    <td></td>
                `;
                document.querySelector('#tbl_categoria').appendChild(nueva_fila);
            });
        }
        console.log(json);
    } catch (e) {
        console.log("Ups, ocurrió un error " + e);
    }
}

if (document.querySelector('#tbl_categoria')) {
    listar_categorias_admin();
}