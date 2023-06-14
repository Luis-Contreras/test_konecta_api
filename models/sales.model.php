<?php

require_once "connection.php";

/* ==========
   list sales
============= */

class SalesModel{

    static public function getData(){

        $sql = 
        'SELECT 
            shops.name_product as name_product, 
            SUM(sales.quantity_sold) as quantity 
            FROM coffee_shops shops 
            INNER JOIN coffee_sales sales 
            ON shops.id = sales.id_product 
            GROUP BY sales.id_product
        ';
        $stmt = Connection::connect()->prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

}