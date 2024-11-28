<div id="form-control">
    <form action="" id="formInsertPersona">
        <center><h3><b>Formulario de registro de personas</b></h3></center>
    <div class="mb-3">
        <label for="nro_identidad" class="form-label">Nro. de Identidad: </label>
        <input type="text" class="form-control" id="nro_identidad" placeholder="Nro de identidad*" name="nro_identidad">
    </div>

    <div class="mb-3">
        <label for="razon_social" class="form-label">Razón social: </label>
        <input type="text" class="form-control" id="razon_social" placeholder="Razón social*" name="razon_social">
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Telefono: </label>
        <input type="number" class="form-control" id="telefono" placeholder="Telefono*" name="telefono">
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label">correo: </label>
        <input type="email" class="form-control" id="correo" placeholder="correo*" name="correo">
    </div>

    <div class="mb-3">
        <label for="departamento" class="form-label">Departamento: </label>
        <input type="text" class="form-control" id="departamento" placeholder="Departamento*" name="departamento">
    </div>

    <div class="mb-3">
        <label for="provincia" class="form-label">Provincia: </label>
        <input type="text" class="form-control" id="provincia" placeholder="Provincia*" name="provincia">
    </div>

    <div class="mb-3">
        <label for="distrito" class="form-label">Distrito: </label>
        <input type="text" class="form-control" id="distrito" placeholder="Distrito*" name="distrito">
    </div>

    <div class="mb-3">
        <label for="cod_postal" class="form-label">Código postal: </label>
        <input type="number" class="form-control" id="cod_postal" max="99999" placeholder="Codigo Postal*" name="cod_postal">
    </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección: </label>
        <input type="text" class="form-control" id="direccion" placeholder="Dirección*" name="direccion">
    </div>

    <div class="mb-3">
        <label for="rol" class="form-label">Rol: </label>
        <input type="text" class="form-control" id="rol" placeholder="Rol*" name="rol">
    </div>

    <div class="mb-3">
            <label for="password" class="form-label">Contraseña: </label>
            <input type="password" class="form-control" id="password" placeholder="Contraseña*" name="password">
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">estado: </label>
        <input type="number" class="form-control" id="estado" placeholder="estado*" name="estado">
    </div>

    <div class="mb-3">
        <label for="fecha_reg" class="form-label">fecha de registro: </label>
        <input type="date" class="form-control" id="fecha_reg" placeholder="fecha de registro*" name="fecha_reg">
    </div>

    <center>
        <button type="button" onclick="insertar_persona()" class="btn btn-danger">Insertar</button>
    </center>
    </form>
</div>

<script src="<?php echo BASE_URL; ?>views/js/funcions_persona.js"></script>
<script >insertar_persona();</script>
