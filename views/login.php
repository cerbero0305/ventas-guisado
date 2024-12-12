<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #5C5555;">
    <div id="contenido" style="min-height: 815px">
        <div id="cabecera" class="" style="width: 100%;">  
            <nav class="navbar  row col-12 d-flex" style="background-color: gray; width: 100%;">
              <div class="container-fluid col-6">
                <a class="navbar-brand" href="index.html">
                  <img src="./views/plantilla/img/snaptube.jpg" alt="Logo" style="margin-left: 20px; border-radius: 10px;" width="80" height="70" class="d-inline-block fw-bold fs-3">
                  SNAPTUBE
                </a>
              </div>
                  <div class="container-fluid col-6" style="justify-content: end;">
                    <form1 class="d-flex" role="search">
                      <a href="informacion.html" style="margin-right: 20px;"><img src="./img/inicio.png"  height="50px" alt=""></a>
                      <buttons class="btn btn-outline-dark fw-bold fs-4" style="margin-right: 20px;" type="submit">Buscar</buttons>
                    </form1>
                  </div>
            </nav>          
      </div>
      <script> const base_url = '<?php echo BASE_URL; ?>'; </script>
      <div>
        <div class="cuerpo" style="display: flex; justify-content: center; margin-top: 40px;">
        <div class="login" style="display: flex; background-color: rgb(212, 212, 212); justify-content: center; align-items: center; flex-direction: column; border-radius: 10px; height: 635px; width: 60%;">
            <p class="text-start text-uppercase fs-2 fw-bold m-0 ">Inicio de sesión en snaptube</p>
            <button type="button" class="btn btn-secondary" style="width: 300px; margin: 5px;">Continuar con Google</button>
            <button type="button" class="btn btn-secondary" style="width: 300px; margin: 5px;">Continuar con Facebook</button>
            <button type="button" class="btn btn-secondary" style="width: 300px; margin: 5px;">Continuar con el numero de telefono</button>
            <div class="linea" style="margin: 10px 0 10px 0; width: 400px; height: 2px; background-color: black;"></div>
            <div class="mb-3">
              <form id="fom_login">
                <label for="usuario" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="usuario"  placeholder="nombre de usuario">
                
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password"  placeholder="Contraseña">
              </form>
                <div class="form-check form-switch" style="display: flex; justify-content: center;">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Recordar</label>
                  </div>
                  <div class="col-12" style="display: flex; justify-content: center;">
                    <a href="inicio"><button type="submit" class="btn btn-primary">Iniciar</button></a>
                  </div>
                  <a href="" style="display: flex; justify-content: center;">¿Olvidaste tu contraseña?</a>
                  <div class="linea" style="margin: 10px 0 10px 0; width: 400px; height: 2px; background-color: black;"></div>
                  <p class="text-start text-uppercase m-0 ">¿No tienes una cuenta? Regístrate en SNAPTUBE</p>
              </div>
              
        </div>
      </div>
      </div>
    </div>
    <script src="<?php echo BASE_URL; ?>views/js/funcions_login.js"></script>
</body>
</html>