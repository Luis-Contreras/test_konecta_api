<?php

require_once 'models/get.model.php';

class GetController{

    static public function getData(){

        $response = GetModel::getData();

        $getFormatRes = new GetController();
        $getFormatRes -> jsonResponse($response);

    }

    public function jsonResponse($response){

        if(!empty($response)){

            $json = array(
                "status" => 200,
                'total' => count($response),
                "result" => $response
            );
            

        }else{
            
            $json = array(
                "status" => 200,
                "result" => 'Not Found',
            );

        }

        echo json_encode($json, http_response_code($json["status"]));



    }

}