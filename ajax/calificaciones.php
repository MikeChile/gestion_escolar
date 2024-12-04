<?php
require_once "../modelos/Calificaciones.php";
if (strlen(session_id()) < 1)
	session_start();
$asistencia = new Calificaciones();

$id = isset($_POST["idcalificacion"]) ? limpiarCadena($_POST["idcalificacion"]) : "";
$val = isset($_POST["valor"]) ? limpiarCadena($_POST["valor"]) : "";
$alumn_id = isset($_POST["alumn_id"]) ? limpiarCadena($_POST["alumn_id"]) : "";
$block_id = isset($_POST["idcurso"]) ? limpiarCadena($_POST["idcurso"]) : "";
$user_id = $_SESSION["idusuario"];

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($id)) {
			$rspta = $asistencia->insertar($_POST["nota"], $_POST["nombreEvaluacion"], $_POST["comentario"], $_POST["idAlumnoCalificar"], $_POST["idMateria"], $_POST["idcurso"]);
			echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
		} else {
			$rspta = $asistencia->editar($id, $val, $alumn_id, $block_id);
			echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
		}
		break;

	case 'mostrarCalificaciones':
		$id_alumno = isset($_GET["id_alumno"]) ? $_GET["id_alumno"] : 28;

		try {
			$rspta = $asistencia->mostrarCalificaciones($id_alumno);
			if ($rspta) {
				error_log("Datos recuperados correctamente para id_alumno=$id_alumno");
				echo json_encode($rspta);
			} else {
				echo json_encode(array('error' => 'No se encontraron calificaciones.'));
			}
		} catch (Exception $e) {
			echo json_encode(array('error' => $e->getMessage()));
		}

		break;

	case 'desactivar':
		$rspta = $asistencia->desactivar($id);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta = $asistencia->activar($id);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;

	case 'mostrar':
		$rspta = $asistencia->mostrar($id);
		echo json_encode($rspta);
		break;
	case 'verificar':

		$rspta = $asistencia->verificar($alumn_id, $block_id);
		echo json_encode($rspta);
		break;

	case 'agregarCalificacion':
		$nota = $_POST["nota"];
		$nombre_evaluacion = $_POST["nombreEvaluacion"];
		$comentario = $_POST["comentario"];
		$id_alumno = $_POST["idAlumnoCalificar"];
		$id_curso = $_POST["idcurso"]; // Asegúrate de que este campo esté disponible

		$rspta = $asistencia->insertarCalificacion($nota, $nombre_evaluacion, $comentario, $id_alumno, $id_curso);
		echo $rspta ? "Calificación agregada correctamente" : "No se pudo agregar la calificación";
		break;

	case 'listar':
		require_once "../modelos/Alumnos.php";
		$alumnos = new Alumnos();
		$team_id = $_REQUEST["idgrupo"];
		$rspta = $alumnos->listar($user_id, $team_id);
		$data = array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				//"0" => ($reg->is_active) ? '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->id . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-warning btn-xs" onclick="mostrar_precios(' . $reg->id . ')">P</i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="desactivar(' . $reg->id . ')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->id . ')"><i class="fa fa-pencil"></i></button>' . '<button class="btn btn-warning btn-xs" onclick="mostrar_precios(' . $reg->id . ')">P</i></button>' . ' ' . '<button class="btn btn-primary btn-xs" onclick="activar(' . $reg->id . ')"><i class="fa fa-check"></i></button>',
				"0" => "<img src='../files/articulos/" . $reg->image . "' height='50px' width='50px'>",
				"1" => $reg->name,
				"2" => $reg->lastname,
				"3" => $reg->phone,
				"4" => '<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalCalificar" data-id="' . $reg->id . '"><i class="fa fa-check"></i> Calificaciones</button>'
			);
		}
		$results = array(
			"sEcho" => 1, //info para datatables
			"iTotalRecords" => count($data), //enviamos el total de registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);
		break;
}
