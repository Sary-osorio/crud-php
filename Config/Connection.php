<?php
require_once "Server.php";

class Connection
{
    protected static function conectar()
    {

        try {

            $mbd = new PDO(SGBD, USER, PASS);

            return $mbd;
        } catch (PDOException $e) {

            return $e;
        }
    }

    public static function Select($sql)
    {

        $query = self::conectar()->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
