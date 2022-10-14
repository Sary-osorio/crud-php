<div class="modal fade" id="registrarCargo" tabindex="-1" aria-labelledby="registrarCargoLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registrarCargoLabel">Registrar Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                CargoController::registrarCargos();
                ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="cargo" class="form-label">Cargo: </label>
                        <input type="text" class="form-control" name="cargo">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnregistrar">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>