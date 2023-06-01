<?php

require_once "connection.php";

/* ==========
   list products except is delete = 1
============= */

class GetModel{

    static public function getData(){

        $sql = 
        'SELECT 
            id,
            name_product,
            reference,
            price,
            weight,
            category,
            stock
         FROM coffee_shops WHERE isDelete <> 1';
        $stmt = Connection::connect()->prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

}