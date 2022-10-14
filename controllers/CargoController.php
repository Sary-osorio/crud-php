<?php

include 'Models/CargoModel.php';

class CargoController
{
    public static $cargo;
    public static $id;
    public static $lista;

    public static function listarCargos()
    {

        $cargos = new CargoModel();
        $lista_car = $cargos->obtener_cargos();
        return $lista_car;
    }
    public static function registrarCargos()
    {
        $id = explode('/', $_GET['view']);

        if (isset($_POST['btnregistrar'])) {
            if (!empty($_POST['cargo'])) {
                $cargos = new CargoModel();
                $cargos->insertar_cargos($_POST['cargo']);
            }
            self::$lista = '';
        }
        if (isset($_POST['btnupdate'])) {
            if (!empty($_POST['cargo'])) {
                $cargos = new CargoModel();
                $cargos->modificar_cargos($_POST['id'], $_POST['cargo']);

                header('Location:' . SERVERURL . $id[0]);
            }
        } else if (!empty($id[1]) && $id[1] == 'edit') {
            if (!empty($id[2])) {

                $cargos = new CargoModel();
                self::$lista = $cargos->obtener_cargo_id($id[2]);
            }
        }

        if (isset($_POST['btncancelar'])) {
            self::$lista = '';
            header('Location:' . SERVERURL . $id[0]);
        }



        return  self::$lista;
    }



    public static function borrarRegistro()
    {
        $id = explode('/', $_GET['view']);

        if (!empty($id[1]) && $id[1] == "del") {
            $cargos = new CargoModel();
            $cargos->delete_cargos($id[2]);
            header('Location:' . SERVERURL . $id[0]);
        }
    }
}
