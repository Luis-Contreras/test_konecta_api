<?php

require_once "connection.php";

class PostModel{

    static public function postData($body){

        /* ==========
            build query
        ============= */

        $props = "";
        $values = "";

    
        foreach ($body as $key => $value) {
            $props .= $key.",";
            if(!is_numeric($value)){
                $values .= "'".$value."'". ",";
            }else{
                $values .= $value.",";
            }
        }
        
        $sql = "INSERT INTO coffee_shops (".$props."createAt) VALUES (".$values."now());";
        $stmt = Connection::connect()->prepare($sql);
        if($stmt -> execute()){
            $response = array(
                'record' => $body,
                'comment' => 'successfully created'
            );

            return $response;
        }else{
            $response = array(
                'record' => null,
                'comment' => 'error created'
            );

            return $response;
        }
    }

}