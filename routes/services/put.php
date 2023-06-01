<?php
require_once 'controllers/put.controller.php';

/* ==========
    validation id in get and call controller
    if exist quantity sold in send to controller
============= */

if(array_key_exists("id", $_GET)){

    $id = $_GET['id'];

    $quantitySold = 0;

    if(array_key_exists("quantity_sold", $_GET)){
        $quantitySold = $_GET['quantity_sold'];
    }
   
    $body = $_GET;

    $response = new PutController();
    $response -> putData($id, $body, $quantitySold);

}else{
    $json = array(
        "status" => 400,
        "result" => 'id not found',
    );
    
    echo json_encode($json, http_response_code($json["status"]));
}

