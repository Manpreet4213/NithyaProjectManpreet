<?php
class Database{
    private static $username='root';
    private static $password='root';
    private static $dbname='resort_database';
    private static $dsn='mysql:host=localhost;dbname=resort_database';
    private static $dbconn;

    private function __construct()
    {

    }

    public static function getDB()
    {
        if(!isset(self::$dbconn))
        {
            self::$dbconn = new PDO(self::$dsn ,self::$username,self::$password);
        }
        return self::$dbconn;
    }


}