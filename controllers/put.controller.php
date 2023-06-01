<?php

require_once 'models/put.model.php';

class PutController{

    static public function putData($id, $body, $quantitySold){

        $response = PutModel::putData($id, $body, $quantitySold);
        $getFormatRes = new PutController();
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
                "status" => 404,
                "result" => 'Not Found',
            );

        }

        echo json_encode($json, http_response_code($json["status"]));




    }

}