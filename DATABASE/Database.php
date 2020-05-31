<?php

class Database
{
    private static $user = 'root';
    private static $password = '';
    private static $dbname = 'resort_database';
    private static $dsn = 'mysql:host=localhost;dbname=resort_database';
    private static $dbcon;

    private function __construct()
    {
    }

    public static function getDb()
    {
        try {
            if(!isset(self::$dbcon)){
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$password);
            }
        } catch (PDOException $e) {
            $msg = $e->getMessage();
            include 'customError.php';
            exit();
        }
        return self::$dbcon;
    }
}