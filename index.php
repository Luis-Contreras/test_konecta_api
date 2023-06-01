<?php

/*====================
    Show Errors
=====================*/

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", "C:/xampp/htdocs/test_konecta_api/php_error_log");


/*====================
    requirements
=====================*/

require_once "controllers/routes.controller.php";

$index = new RoutesController();
$index -> index();