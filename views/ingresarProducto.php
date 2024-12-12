<div id="form-control">
    <form action="" id="formInsertProducto">
        <center><h3><b>Formulario de registro de productos</b></h3></center>
    <div class="mb-3">
        <label for="codigo" class="form-label">Código: </label>
        <input type="text" class="form-control" id="codigo" placeholder="Código de producto*" name="codigo">
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre: </label>
        <input type="text" class="form-control" id="nombre" placeholder="Nombre de producto*" name="nombre">
    </div>

    <div class="mb-3">
        <label for="detalle" class="form-label">Detalle: </label>
        <input type="text" class="form-control" id="detalle" placeholder="Detalles del producto*" name="detalle">
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio: </label>
        <input type="number" class="form-control" id="precio" min="1" max="90000" step="0.10" placeholder="Precio*" name="precio">
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock: </label>
        <input type="number" class="form-control" id="stock" min="1" max="999999" placeholder="Stock*" name="stock">
    </div>
    
    <div class="mb-3">
        <label for="id_categoria" class="form-label">Categoria: </label>
        <select class="form-control" name="id_categoria" id="id_categoria" required>
        <option disabled>Seleccione</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen de producto 1: </label>
        <input type="file" class="form-control" id="imagen" name="imagen">
    </div>

    <div class="mb-3">
        <label for="id_proveedor" class="form-label">Proveedor: </label>
        <select class="form-control" name="id_proveedor" id="id_proveedor" required>
        <option disabled>Seleccione</option>
        </select>
    </div>
    <center>
        <button type="button" onclick="insertar_producto()" class="btn btn-danger">Insertar</button>
        <button type="button" onclick="insertar_producto()" class="btn btn-danger">eliminar</button>
    </center>
    </form>
</div>
<script>listar_categorias();</script>
<script>listar_proveedores();</script>