<?php


// БАЗА ДАНЫХ

class DB{
    const USER = "u0789349_testpar";
    const PASS = '200899Xs1loading';
    const HOST = "localhost";
    const DB = "u0789349_logistikcrm";

    public static function cannToDB() {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        
        return $conn;
    }

}