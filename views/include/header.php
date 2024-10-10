<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body style="background-color: rgb(212, 212, 212);">
    <div id="contenido" style="min-height: 815px">
        <div id="cabecera" class="" style="width: 100%;">  
            <nav class="navbar  row col-12 d-flex" style="background-color: gray; width: 100%;">
              <div class="container-fluid col-6">
                <a class="navbar-brand" href="login">
                  <img src="./views/plantilla/img/snaptube.jpg" alt="Logo" style="margin-left: 20px; border-radius: 10px;" width="80" height="70" class="d-inline-block fw-bold fs-3">
                  SNAPTUBE
                </a>
              </div>
                  <div class="container-fluid col-6" style="justify-content: end;">
                    <form class="d-flex" role="search">
                      <a href="informacion" style="margin-right: 20px;"><img src="./views/plantilla/img/inicio.png"  height="50px" alt=""></a>
                      <a href="buscar"><buttons class="btn btn-outline-dark fw-bold fs-4" style="margin-right: 20px;" type="submit">Buscar</buttons></a>
                    </form>
                  </div>
            </nav>          
      </div>
      <div id="cuerpo" style="display: flex;">
        <div class="menuizquierdo w-15%">
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group" style="height: 815px; background-color: rgb(212, 212, 212); align-items: center; justify-content: center;">
                <a href="<?php echo BASE_URL ?>inicio" class="btn btn-light fs-4 fw-bold" style="margin:20px; padding:0; border-radius:10px; width: 110px; height: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center;"><img src="./views/plantilla/img/inicio.png" style="height: 40px;" class="img-fluid mr-2" alt="">Inicio</a>
                <a href="<?php echo BASE_URL ?>tendencias" class="btn btn-light fs-5 fw-bold" style="margin:20px; padding:0; border-radius:10px; width: 110px; height: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center;"><img src="./views/plantilla/img/tendencias.png" style="height: 40px;" class="img-fluid mr-2" alt="">Tendencias</a>
                <a href="<?php echo BASE_URL ?>youtube" class="btn btn-light fs-4 fw-bold" style="margin:20px; padding:0; border-radius:10px; width: 110px; height: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center;"><img src="./views/plantilla/img/youtube.png" style="height: 40px;" class="img-fluid mr-2" alt="">Youtube</a>
                <a href="<?php echo BASE_URL ?>musica" class="btn btn-light fs-4 fw-bold" style="margin:20px; padding:0; border-radius:10px; width: 110px; height: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center;"><img src="./views/plantilla/img/musica.png" style="height: 40px;" class="img-fluid mr-2" alt="">Musica</a>
                <a href="<?php echo BASE_URL ?>yo" class="btn btn-light fs-2 fw-bold" style="margin:20px; padding:0; border-radius:10px; width: 110px; height: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center;">Yo</a>
              </div>
          </div>
          
    <?php echo BASE_URL; ?>