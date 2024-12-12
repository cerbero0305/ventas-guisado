async function listar_personas() {
    try {
        let respuesta = await fetch(base_url + '/controller/Persona.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="" disabled selected>Seleccione</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.razon_social + '</option>';
            });
            document.getElementById('idPersona').innerHTML = contenido_select;
        }
        console.log(respuesta);
    }catch(e){
        console.log("Error al cargar categorias." + e);
    }
}

async function obtener_personas_admin() {
    try {
        let respuesta = await fetch(base_url + '/controller/Persona.php?tipo=listarAdmin');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let cont = 0;
            datos.forEach(item => {
                let nueva_fila = document.createElement("tr");
                // "nueva_fila.id" = id de la nueva fila, "item.id" = id de la base de datos(producto)
                nueva_fila.id = "fila" + item.id;
                // Sumar 1 al contador
                /* cont+=1; */
                cont++;
                // los items.xx vienen De la Base de datos
                nueva_fila.innerHTML = `
                    <th>${cont}</th>
                    <td>${item.nro_identidad}</td>
                    <td>${item.razon_social}</td>
                    <td>${item.telefono}</td>
                    <td>${item.correo}</td>
                    <td>${item.cod_postal}</td>
                    <td>${item.direccion}</td>
                    <td>${item.rol}</td>
                    <td>${item.nro_identidad}</td>
                    <td></td>
                `;
                document.querySelector('#tbl_persona').appendChild(nueva_fila);
            });
        }
        console.log(json);
    } catch (e) {
        console.log("Ups, ocurrió un error " + e);
    }
}

if (document.querySelector('#tbl_persona')) {
    listar_personas_admin();
}

async function registrarPersona() {
    let nro_identidad = document.querySelector('#nro_identidad').value;
    let razon_social = document.querySelector('#razon_social').value;
    let telefono = document.querySelector('#telefono').value;
    let correo = document.querySelector('#correo').value;
    let departamento = document.querySelector('#departamento').value;
    let provincia = document.querySelector('#provincia').value;
    let distrito = document.querySelector('#distrito').value;
    let cod_postal = document.querySelector('#cod_postal').value;
    let direccion = document.querySelector('#direccion').value;
    let rol = document.querySelector('#rol').value;
    let contraseña = document.querySelector('#nro_identidad').value;
    let estado = document.querySelector('#estado').value;
    let fecha_reg = document.querySelector('#fecha_reg').value;
    
    if (nro_identidad == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "" || contraseña == "" || estado == "" || fecha_reg == "") {
        alert("Error, campos vacíos");
        return;
    }
    try {
        // Capturar los datos del formulario y guardarlos en la constante "datos"
        const datos = new FormData(formInsertPersona);
        let respuesta = await fetch(base_url + '/controller/Persona.php?tipo=registrar',{
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