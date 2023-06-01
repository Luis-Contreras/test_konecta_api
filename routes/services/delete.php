<?php
require_once 'controllers/delete.controller.php';

/* ==========
    validation id in get and call controller
============= */

if(array_key_exists("id", $_GET)){

    $id = $_GET['id'];
    $response = new DeleteController();
    $response -> deleteData($id);

}else{
    $json = array(
        "status" => 400,
        "result" => 'id not found',
    );
    
    echo json_encode($json, http_response_code($json["status"]));
}

