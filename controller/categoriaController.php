<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../model/categoriaModel.php");
    $categoria = new categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetAll":
            $datos=$categoria->get_categoria();
            echo json_encode($datos);
        break;

        case "GetId":
            $datos=$categoria-> get_categoria_id($body["cat_id"]);
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Insert Correcto");
        break;

        case "Update":
            $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Se ha actualiado correctamente");
        break;

        case "Delete":
            $datos=$categoria->delete_categoria($body["cat_id"]);
            echo json_encode("Se ha cambiado de estado correctamente");
        break;
    }
?>