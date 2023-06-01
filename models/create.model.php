<?php

require_once "connection.php";

/* ==========
   BUILD AND EXECUTE QUERY
   CREATE TABLES IF NOT EXIST
============= */


class CreateModel{

    static public function CreateTable(){
        
        $sql = 'CREATE TABLE if not exists coffee_shops (
            id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name_product varchar(100) NOT NULL,
            reference varchar(100) NOT NULL,
            price int(11) NOT NULL,
            weight int(11) NOT NULL,
            category varchar(100) NOT NULL,
            stock int(11) NOT NULL,
            isDelete int(11) NULL DEFAULT 0,
            createAt DATE NULL,
            updateAt DATE NULL,
            deleteAt DATE NULL
        )';
        $stmt = Connection::connect()->prepare($sql);
        $stmt -> execute();

        $sql = 'CREATE TABLE if not exists coffee_sales (
            id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            id_product int(11) NOT NULL,
            quantity_sold int(11) NOT NULL,
            createAt DATE NOT NULL
        )';
        $stmt = Connection::connect()->prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

}