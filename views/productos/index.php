<h2 class="text-center">PRODUCTOS</h2>
<div class="row justify-content-center mt-3 mb-5">
    <form class="border bg-light shadow rounded p-4 col-lg-6" id="FormProducto">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="producto_id" id="producto_id" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="producto_nombre">Nombres del Prodcuto</label>
                <input type="text" name="producto_nombre" id="producto_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="producto_precio">Precio</label>
                <input type="number" name="producto_precio" step="any" id="producto_precio" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" id="BtnGuardar" class="btn btn-primary w-100 text-uppercase shadow border-0">Guardar</button>
            </div>
        </div>
    </form>

    <!-- MOSTRAR DATOS -->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 table-wrapper">
            <h2 class="text-center mb-4">Productos Ingresados</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="ProductosIngresados">
                    <thead class="table-warning">
                        <tr>
                            <th>No.</th>
                            <th>Nombres</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class="text-center">Sin productos registrados</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= asset('./build/js/productos/index.js') ?>"></script>