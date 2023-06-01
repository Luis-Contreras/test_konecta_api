<?php

require_once "connection.php";

class DeleteModel{

    static public function deleteData($id){

        /* ==========
           a drop is not made 
           if I don't know what to change 
           to delete so as not to delete the record
        ============= */

        $sql = "UPDATE coffee_shops SET isDelete = 1, deleteAt = now() WHERE id =".$id."";
        $stmt = Connection::connect()->prepare($sql);
        if($stmt -> execute()){
            $response = array(
                'record' => $id,
                'comment' => 'successfully deleted'
            );

            return $response;
        }else{
            $response = array(
                'record' => null,
                'comment' => 'error deleted'
            );

            return $response;
        }
    }

}