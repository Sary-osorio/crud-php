<?php include 'Models/EmpleadoModel.php';

class EmpleadoController
{
    public static $lista;

    public static function llenarCombo()
    {
        $cargo = new EmpleadoModel();
        $lista_cargo = $cargo->obtener_cargos();
        return $lista_cargo;
    }

    public static function listarEmpleados()
    {
        $empleado = new EmpleadoModel();
        $lista_emp = $empleado->obtener_empleado();
        return $lista_emp;
    }

    public static function registrarEmpleados()
    {
        $id = explode('/', $_GET['view']);

        if (isset($_POST['btnregistrar'])) {
            if (!empty($_POST['nombre']) || !empty($_POST['apellido']) || !empty($_POST['id_cargo'])) {
                $empleado = new EmpleadoModel();
                $empleado->insertar_empleado($_POST['nombre'], $_POST['apellido'], $_POST['id_cargo']);
            }
            self::$lista = '';
        }
        if (isset($_POST['btnupdate2'])) {
            var_dump($_POST['id']);
            var_dump($_POST['nombre']);
            var_dump($_POST['apellido']);
            var_dump($_POST['id_cargo']);

            if (!empty($_POST['nombre']) || !empty($_POST['apellido']) || !empty($_POST['id_cargo'])) {
                $empleado = new EmpleadoModel();
                $empleado->modificar_empleados($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['id_cargo']);
                header('Location:' . SERVERURL . $id[0]);
            }
        } else if (!empty($id[1]) && $id[1] == 'edit') {
            if (!empty($id[2])) {
                $empleado = new EmpleadoModel();
                self::$lista = $empleado->obtener_empleado_id($id[2]);
            }
        }

        if (isset($_POST['btncancelar'])) {
            self::$lista = '';
            header('Location:' . SERVERURL . $id[0]);
        }
        return  self::$lista;
    }

    public static function borrarEmpleado()
    {
        $id = explode('/', $_GET['view']);
        if (!empty($id[1]) && $id[1] == "del") {
            $empleado = new EmpleadoModel();
            $empleado->delete_empleado($id[2]);
            header('Location:' . SERVERURL . $id[0]);
        }
    }
}
