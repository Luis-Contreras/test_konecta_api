<?php

require_once 'models/create.model.php';


class CreateController{

    static public function createData(){

        $response = CreateModel::CreateTable();

        $getFormatRes = new CreateController();
        $getFormatRes -> jsonResponse($response);

    }

    public function jsonResponse($response){
        $json = array(
                "status" => 200,
                "result" => 'table created'
        );
        
        echo json_encode($json, http_response_code($json["status"]));

    }

}