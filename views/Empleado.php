<!DOCTYPE html>
<?php include 'controllers/EmpleadoController.php' ?>
<div class="container mt-2">
    <div class="container bg-info d-flex justify-content-between">
        <label class="h3 text-center">Registro de empleados</label>
    </div>
    <div class="row">
        <?php EmpleadoController::borrarEmpleado(); ?>
        <div class="col-3 mt-2">
            <form action="" method="post" class="border p-2">
                <?php $emp = EmpleadoController::registrarEmpleados() ?>
                <input type="hidden" class="form-control" name="id" value="<?= $emp != '' ? $emp['id'] : '' ?>" required>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="nombre" value="<?= $emp != '' ? $emp['nombre'] : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido: </label>
                    <input type="text" class="form-control" name="apellido" value="<?= $emp != '' ? $emp['apellido'] : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label>Cargo: </label>
                    <select class="form-control" name="id_cargo" required>
                        <?php $combo = EmpleadoController::llenarCombo() ?>
                        <option value>Seleccione</option>
                        <?php foreach ($combo as $c) {
                            if ($emp) : if ($emp['id_cargo'] == $c['id']) : ?>
                                    <option value="<?php echo $c['id'] ?>" selected><?php echo $c['cargo'] ?></option>
                                <?php else :  ?>
                                    <option value="<?php echo $c['id'] ?>"><?php echo $c['cargo'] ?></option>
                                <?php endif ?>
                            <?php else :  ?>
                                <option value="<?php echo $c['id'] ?>"><?php echo $c['cargo'] ?></option>
                            <?php endif ?>
                        <?php } ?>
                    </select>
                </div>
                <?php if ($emp) : ?>
                    <button class="btn btn-info" type="submit" name="btnupdate2">Modificar</button>
                <?php else : ?>
                    <button class="btn btn-info border border-2" type="submit" name="btnregistrar">Guardar</button>
                <?php endif ?>
                <button class="btn btn-light border border-2" type="submit" name="btncancelar">Cancelar</button>
            </form>
        </div>
        <div class="container col overflow-auto mt-2" style="height: 30rem;">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php $lista = EmpleadoController::listarEmpleados();

                    foreach ($lista as $key) { ?>
                        <tr>
                            <td><?= $key['id'] ?></td>
                            <td><?= $key['nombre'] ?></td>
                            <td><?= $key['apellido'] ?></td>
                            <td><?= $key['cargo'] ?></td>
                            <td class="text-center"><a href="<?= SERVERURL ?>Empleado/edit/<?= $key['id'] ?>" class="btn btn-warning <?= $emp != '' ? 'disabled' : '' ?>"><img src="<?= SERVERURL ?>views/icons/update.svg" alt="#"></a>
                                <a href="<?= SERVERURL ?>Empleado/del/<?= $key['id'] ?>" class="btn btn-danger <?= $emp != '' ? 'disabled' : '' ?>"><img src="<?= SERVERURL ?>views/icons/delete.svg" alt="#"></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>