
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 fadeIn">
                <h3 class="text-center mb-4">Formulario de Registro</h3>
                <form id="frmRegistrar">

                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingresa su Codigo">
                    </div>


                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
                    </div>


                    <div class="form-group">
                        <label for="detalle">Detalle</label>
                        <input type="text" class="form-control" id="detalle" name="detalle" placeholder="Ingresa los detalle">
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock Inicial</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingresa tu stock Inicial">
                    </div>

                    <div class="form-group">
                        <label for="categoría">Categoría</label>
                        <input type="number" class="form-control" id="categoría" name="categoría" placeholder="Ingresa la categoría">
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Ingresa tu imagen">
                    </div>

                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <input type="number" class="form-control" id="proveedor" name="proveedor" placeholder="Ingresa tu proveedor">
                    </div>


                    <button type="button" onclick="registrar_producto()" class="btn btn-custom btn-block">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>views/js/funcionsProducto.js"></script>