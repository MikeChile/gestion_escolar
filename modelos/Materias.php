<?php

//incluir la conexion de base de datos
require "../config/Conexion.php";

class Materias
{
    //implementamos nuestro constructor
    public function __construct() {}


    public function listar()
    {
        $sql = "SELECT * FROM materias";
        return ejecutarConsulta($sql);
    }

    public function listarMaterias()
    {
        $sql = "SELECT * FROM materias";
        return ejecutarConsulta($sql);
    }

    public function insertar($nombre)
    {
        $sql = "INSERT INTO materias (nombre) VALUES ('$nombre')";
        return ejecutarConsulta($sql);
    }

    public function editar($idmateria, $nombre)
    {
        $sql = "UPDATE materias SET nombre = '$nombre' WHERE id_materia = '$idmateria'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idmateria)
    {
        $sql = "SELECT * FROM materias WHERE id_materia = '$idmateria'";
        return ejecutarConsulta($sql);
    }

    public function desactivar($idmateria)
    {
        $sql = "UPDATE materias SET estado = 0 WHERE id_materia = '$idmateria'";
        return ejecutarConsulta($sql);
    }

    public function activar($idmateria)
    {
        $sql = "UPDATE materias SET estado = 1 WHERE id_materia = '$idmateria'";
        return ejecutarConsulta($sql);
    }
}
