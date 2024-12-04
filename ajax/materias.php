<?php
require_once "../modelos/Materias.php";

$mat = new Materias();

switch ($_GET["op"]) {
    case 'listar':
        $rspta = $mat->listar();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => ($reg->id_materia),
                "1" => ($reg->nombre)
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

    case 'listarMaterias':
        $rspta = $mat->listarMaterias();
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "id_materia" => $reg->id_materia,
                "nombre" => $reg->nombre
            );
        }
        echo json_encode($data);
        break;

    case 'guardaryeditar':
        if (empty($_POST["idmateria"])) {
            $rspta = $mat->insertar($_POST["nombre"]);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            $rspta = $mat->editar($_POST["idmateria"], $_POST["nombre"]);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    case 'mostrar':
        $rspta = $mat->mostrar($_GET["idmateria"]);
        echo json_encode($rspta);
        break;

    case 'desactivar':
        $rspta = $mat->desactivar($_GET["idmateria"]);
        echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
        break;

    case 'activar':
        $rspta = $mat->activar($_GET["idmateria"]);
        echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
        break;
}
