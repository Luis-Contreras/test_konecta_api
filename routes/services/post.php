<?php

require_once 'controllers/post.controller.php';

if(isset($_POST)){

    /* ==========
        if there is any problem with post we cancel the request
    ============= */

    
    if(empty($_POST)){
        $json = array(
            "status" => 400,
            "result" => 'Error, no data supplied',
        );

        echo json_encode($json, http_response_code($json["status"]));

        return;
    }

    /* ==========
        body validation
    ============= */
    $requiredFields = array('name_product', 'reference', 'price', 'weight', 'category', 'stock');
    $inputFields = array();

    foreach(array_keys($_POST) as $key => $value){
        array_push($inputFields, $value);
    }

    $isDiferent = array_diff_key($requiredFields, $inputFields);

    if(count($isDiferent)){
        $json = array(
            "status" => 400,
            "result" => 'Error, the entered body is not correct',
        );

        echo json_encode($json, http_response_code($json["status"]));

        return;
    }
   
    $response = new PostController();
    $response -> postData($_POST);
}


