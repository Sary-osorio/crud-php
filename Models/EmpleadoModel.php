<?php include 'Config/Connection.php';

class EmpleadoModel extends Connection
{

    public function obtener_empleado()
    {
        $sql = "SELECT emp.id,emp.nombre, emp.apellido, cg.cargo  from empleados emp  inner join cargos cg on emp.id_cargo=cg.id where emp.estado=1";
        $result = self::Select($sql);
        return $result;
    }
    public function obtener_cargos()
    {
        $sql = "SELECT * from cargos where estado=1";
        $result = self::Select($sql);
        return $result;
    }
    public function obtener_empleado_id($id)
    {
        $query = self::conectar()->prepare("SELECT * FROM empleados WHERE estado=1 and id =?");
        $query->bindParam(1, $id);
        $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
    public function insertar_empleado($nombre, $apellido, $id_cargo)
    {
        $query = self::conectar()->prepare("INSERT INTO empleados VALUES(NULL,?,?,?,1)");
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $apellido);
        $query->bindParam(3, $id_cargo);
        $query->execute();
        return "Success";
    }
    public function modificar_empleados($id, $nombre, $apellido, $cargo_id)
    {
        $query = self::conectar()->prepare("UPDATE empleados SET nombre=?, apellido=?, id_cargo=? WHERE id =?");
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $apellido);
        $query->bindParam(3, $cargo_id);
        $query->bindParam(4, $id);
        $query->execute();
    }
    public function delete_empleado($id)
    {
        $query = self::conectar()->prepare("UPDATE empleados SET estado=0 WHERE id =?");
        $query->bindParam(1, $id);
        $query->execute();
    }
}
