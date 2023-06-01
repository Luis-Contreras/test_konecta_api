<?php

require_once "connection.php";

/* ==========
    If in the get of the request there is a quantity_sold, the stock in coffee_shops is updated and the record is saved in coffee_sales
    if a normal put is not made
============= */
       

class PutModel{

    static public function putData($id, $body, $quantitySold){

        if((int)$quantitySold > 0){
            $sql = "UPDATE coffee_shops SET stock = stock - ".$quantitySold.", updateAt = now() WHERE id =".$id."";
            $stmt = Connection::connect()->prepare($sql);
            $stmt -> execute();

            $sql = "INSERT INTO coffee_sales (id_product, quantity_sold, createAt) VALUES (".$id.", ".$quantitySold.", now());";
            $stmt = Connection::connect()->prepare($sql);

            if($stmt -> execute()){
                $response = array(
                    'record' => $body,
                    'comment' => 'successfully sale'
                );
    
                return $response;
            }else{
                $response = array(
                    'record' => null,
                    'comment' => 'error sale'
                );
    
                return $response;
            }



        } else{

            $values = "";

            foreach ($body as $key => $value) {
                if($key != 'id'){
                   
                    if(!is_numeric($value)){
                        $values .= $key. "= '".$value."'".",";
                    }else{
                        $values .= $key."=  ".$value.",";
                    }
    
                }
            }

            $sql = "UPDATE coffee_shops SET ".$values." updateAt = now() WHERE id =".$id."";
            $stmt = Connection::connect()->prepare($sql);
            if($stmt -> execute()){
                $response = array(
                    'record' => $body,
                    'comment' => 'successfully updated'
                );
    
                return $response;
            }else{
                $response = array(
                    'record' => null,
                    'comment' => 'error updated'
                );
    
                return $response;
            }

        }
        
       
    }

}