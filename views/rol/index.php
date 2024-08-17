<div class="row justify-content-center">
    <form class="border bg-light shadow rounded p-4 col-lg-4" id="formularioRoles">
        <h3 class="text-center mb-3"><b>Asignacion de roles</b></h3>
        <input type="hidden" name="rol_id" id="rol_id">
        <div class="row mb-3">
            <div class="col">
                <label for="rol_nombre">Nombre del Rol</label>
                <input type="text" name="rol_nombre" id="rol_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="rol_nombre_ct">Nombre rol CT</label>
                <input type="text" name="rol_nombre_ct" id="rol_nombre_ct" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="rol_app">Nombre rol CT</label>
                <input type="text" name="rol_app" id="rol_app" class="form-control">
            </div>
        </div>
        <div class="row mb-3 justify-content-center text-center ">
            <div class="col-lg-5">
                <button type="submit" id="BtnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="BtnModificar" class="btn btn-warning w-100 text-uppercase shadow border-0">Modificar</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="BtnCancelar" class="btn btn-secondary w-100 text-uppercase shadow border-0">Cancelar</button>
            </div>
        </div>
    </form>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 table-wrapper">
            <h2 class="text-center mb-4">Aplicaciones Ingresadas</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="AplicacionesIngresadas">
                    <thead class="table-warning">
                        <tr>
                            <th>No.</th>
                            <th>Nombre de la Aplicacion</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center">No existen registros</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<script src="<?= asset('./build/js/rol/index.js') ?>"></script>