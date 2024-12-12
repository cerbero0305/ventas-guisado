<div id="form-control">
    <form action="" id="formInsertCompra">
        <center><h3><b>Formulario de registro de compra</b></h3></center>

    <div class="mb-3">
        <label for="id_proveedor" class="form-label">Producto: </label>
        <select class="form-control" name="id_producto" id="id_producto" required>
        <option disabled>Seleccione</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad: </label>
        <input type="text" class="form-control" id="cantidad" placeholder="Cantidad*" name="cantidad">
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio: </label>
        <input type="number" class="form-control" id="precio" placeholder="Precio*" min="1" max="90000" step="0.10" name="precio">
    </div>

    <div class="mb-3">
        <label for="id_trabajador" class="form-label">Persona: </label>
        <select class="form-control" name="id_trabajador" id="id_trabajador" required>
        <option disabled>Seleccione</option>
        </select>
    </div>
    <center>
        <button type="button" onclick="insertar_compra()" class="btn btn-danger">Insertar</button>
    </center>
    </form>
</div>

<script>listar_productosP();</script>
<script>listar_personas();</script>
