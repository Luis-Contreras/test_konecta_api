<?php

require_once 'models/sales.model.php';

class SalesController{

    static public function getData(){

        $response = SalesModel::getData();

        $getFormatRes = new SalesController();
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