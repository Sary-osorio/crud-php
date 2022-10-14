<?php require 'controllers/CargoController.php' ?>

<div class="container" style="height: 80%;">
    <div class="container bg-info d-flex justify-content-between mt-7">
        <label class="h3">Registro de Cargo</label>


    </div>

    <div class="row">

        <div class="col-3 mt-2">
            <form action="" method="post" class="border p-2">
                <?php $cargo = CargoController::registrarCargos() ?>

                <input type="hidden" class="form-control" name="id" value="<?= $cargo != '' ? $cargo['id'] : '' ?>" required>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo: </label>
                    <input type="text" class="form-control" name="cargo" value="<?= $cargo != '' ? $cargo['cargo'] : '' ?>" required>
                </div>
                <?php if ($cargo) : ?>
                    <button class="btn btn-info" type="submit" name="btnupdate">Modificar</button>
                <?php else : ?>
                    <button class="btn btn-info border border-2" type="submit" name="btnregistrar">Guardar</button>
                <?php endif ?>
                <button class="btn btn-light border border-2" type="submit" name="btncancelar">Cancelar</button>

            </form>
        </div>
        <div class="container col overflow-auto mt-2" style="height: 30rem;">

            <table class="table table-bordered  ">
                <thead>
                    <th>ID</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                    $lista = CargoController::listarCargos();
                    foreach ($lista as $key) { ?>
                        <tr>
                            <td><?= $key['id'] ?></td>
                            <td><?= $key['cargo'] ?></td>

                            <td class="text-center"><a href="<?= SERVERURL ?>Cargo/edit/<?= $key['id'] ?>" class="btn btn-warning <?= $cargo != '' ? 'disabled' : '' ?>"><img src="<?= SERVERURL ?>views/icons/update.svg" alt="#"></a>
                                <a href="<?= SERVERURL ?>Cargo/del/<?= $key['id'] ?>" class="btn btn-danger <?= $cargo != '' ? 'disabled' : '' ?>"><img src="<?= SERVERURL ?>views/icons/delete.svg" alt="#"></a>
                                <?php CargoController::borrarRegistro() ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>