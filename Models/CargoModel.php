<?php
include 'Config/Connection.php';

class CargoModel extends Connection
{

    public function obtener_cargos()
    {
        $sql = "SELECT * FROM cargos WHERE estado=true";
        $result = self::Select($sql);
        return $result;
    }
    public function obtener_cargo_id($id)
    {
        $query = self::conectar()->prepare("SELECT * FROM cargos WHERE estado=TRUE AND id =?");
        $query->bindParam(1, $id);
        $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
    public function insertar_cargos($cargo)
    {
        $query = self::conectar()->prepare("INSERT INTO CARGOS VALUES(NULL,?,1)");
        $query->bindParam(1, $cargo);
        $query->execute();
        return "Success";
    }
    public function modificar_cargos($id, $cargo)
    {
        $query = self::conectar()->prepare("UPDATE cargos SET cargo=? WHERE id =?");
        $query->bindParam(1, $cargo);
        $query->bindParam(2, $id);
        $query->execute();
    }
    public function delete_cargos($id)
    {
        $query = self::conectar()->prepare("UPDATE cargos SET estado=0 WHERE id =?");
        $query->bindParam(1, $id);
        $query->execute();
    }
}
