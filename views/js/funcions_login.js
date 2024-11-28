async function iniciar_sesion(params) {
    let usuario = document.querySelector('#usuario');
    let password = document.querySelector('#password');
    if (usuario=="" || password=="") {
        alert('campos vacios');
        return;
    }
}

try {
    // capturamos datos del formulario
    const datos = new FormData(fom_login);
    //enviar datos hacia el controlador
    let respuesta = await fetch(base_url + 'controller/Login.php?tipo=iniciar_sesion',{
        method: 'POST',
        mede: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json =  await respuesta.json();
    if (json.status) {
        //swal("iniciar_sesion", json.mensaje,"succes");
        location.replace(base_url+"nuvo-producto")
    }else{
        swal("iniciar_sesion", json.mensaje,"error");
    }
    console.log(json);
    //console.log(respuesta);
} catch (e) {
    console.log("Oop, ocurrio un error" + e);
}

if (document.querySelector('#fom_login')) {
    //evita que se envie el formulario
    let login = document.querySelector('#fom_login');
    fom_login.onsubmit = function (e){
        e.preventdefaul();
        iniciar_sesion();
    }
} 

async function cerrar_sesion() {
    try {
        let respuesta = await fetch(base_url + 'controller/Login.php?tipo=cerrar_sesion',{
            method: 'POST',
            mede: 'cors',
            cache: 'no-cache'
        });
        json =  await respuesta.json();
        if (json.status) {
            location.replace(base_url+"login");
        }
    } catch (error) {
        console.log('Ocurrio un error' + errror);
    }
}