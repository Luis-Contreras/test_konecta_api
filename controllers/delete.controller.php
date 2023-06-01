<?php

require_once 'models/delete.model.php';

class DeleteController{

    static public function deleteData($id){

        $response = DeleteModel::deleteData($id);
        $getFormatRes = new DeleteController();
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