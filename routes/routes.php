<?php


$routesArray = explode("/", $_SERVER["REQUEST_URI"]);
$routesArray = array_filter($routesArray);


/* ==========
    PATH NO MATCH
============= */
if(count($routesArray) == 1){
    $json = array(
        "status" => 404,
        "result" => 'unspecified path, please add /api'
    );
    
    echo json_encode($json, http_response_code($json["status"]));
    return ;
}

/* ==========
    METHOD FOR CREATE TABLE
============= */
if(count($routesArray) == 3 && $routesArray[3] == "create_table"){
    include "services/create.php";
}

/* ==========
    REQUESTS METHODS
============= */
if(count($routesArray) == 3 && isset($_SERVER["REQUEST_METHOD"])){
    
    /* ==========
        LIST PRODUCTS
    ============= */
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        include "services/get.php";
    }

    /* ==========
        CREATE PRODUCT
    ============= */
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "services/post.php";
    }

    /* ==========
        UPDATE PRODUCT
    ============= */
    if($_SERVER["REQUEST_METHOD"] == "PUT"){
        include "services/put.php";
    }

    /* ==========
        DELETE PRODUCT
    ============= */
    if($_SERVER["REQUEST_METHOD"] == "DELETE"){
        include "services/delete.php";
    }
}

