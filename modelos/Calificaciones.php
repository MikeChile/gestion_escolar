<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Calificaciones
{


	//implementamos nuestro constructor
	public function __construct() {}

	//metodo insertar registro
	public function insertar($nota, $nombre_evaluacion, $comentario, $id_alumno, $id_materia, $id_curso)
	{
		$sql = "INSERT INTO calificaciones (id_curso, nota, nombre_evaluacion, comentario, id_alumno, id_materia) VALUES ('$id_curso', '$nota', '$nombre_evaluacion', '$comentario', '$id_alumno', '$id_materia')";
		return ejecutarConsulta($sql);
	}

	public function editar($id, $val, $alumn_id, $block_id)
	{
		$sql = "UPDATE calification SET val='$val',alumn_id='$alumn_id',block_id='$block_id' 
	WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	public function mostrarCalificaciones($id_alumno)
	{
		/*$sql = "SELECT c.*, m.nombre as nombre_materia 
           FROM calificaciones c 
           INNER JOIN materias m ON c.id_materia = m.id_materia 
           WHERE c.id_alumno = '$id_alumno'";
		echo "Consulta: $sql";*/
		$sql = "SELECT c.*, m.nombre AS nombre_materia 
        FROM calificaciones c 
        INNER JOIN materias m ON c.id_materia = m.id_materia 
        WHERE c.id_alumno = '$id_alumno'";

		return ejecutarConsulta($sql);
	}

	public function insertarCalificacion($nota, $nombre_evaluacion, $comentario, $id_alumno, $id_curso)
	{
		$sql = "INSERT INTO calificaciones (nota, nombre_evaluacion, comentario, id_alumno, id_curso) VALUES ('$nota', '$nombre_evaluacion', '$comentario', '$id_alumno', '$id_curso')";
		return ejecutarConsulta($sql);
	}

	public function verificar($alumn_id, $block_id)
	{
		$sql = "SELECT * FROM calification WHERE alumn_id='$alumn_id' AND block_id='$block_id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function listar_calificacion($idalumno, $idcurso)
	{
		$sql = "SELECT * FROM calification WHERE alumn_id='$idalumno' AND block_id='$idcurso'";
		return ejecutarConsulta($sql);
	}

	public function desactivar($id)
	{
		$sql = "UPDATE calification SET condicion='0' WHERE id='$id'";
		return ejecutarConsulta($sql);
	}
	public function activar($id)
	{
		$sql = "UPDATE calification SET condicion='1' WHERE id='$id'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($id)
	{
		$sql = "SELECT * FROM calification WHERE id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//listar registros
	public function listar()
	{
		$sql = "SELECT * FROM calification";
		return ejecutarConsulta($sql);
	}
	//listar y mostrar en selct
	public function select()
	{
		$sql = "SELECT * FROM calification WHERE condicion=1";
		return ejecutarConsulta($sql);
	}
}
