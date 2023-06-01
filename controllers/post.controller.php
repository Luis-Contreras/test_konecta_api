<?php

require_once 'models/post.model.php';

class PostController{

    static public function postData($body){

        $response = PostModel::postData($body);
        $getFormatRes = new PostController();
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
                "result" => 'Not Found Post',
            );

        }

        echo json_encode($json, http_response_code($json["status"]));



    }

}