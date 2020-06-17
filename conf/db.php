<?php


// БАЗА ДАНЫХ

class DB{
    const USER = "root";
    const PASS = 'root';
    const HOST = "localhost";
    const DB = "logicCrm";

    public static function cannToDB() {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return $conn;
    }

}