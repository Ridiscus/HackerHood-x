<?php

class Database {

    private static $dbHost = "localhost";
    private static $dbName = "id21421679_sid";
    private static $dbUsername = "id21421679_rid";
    private static $dbUserpassword = "Naruto@Kinda66";
    private static $connection = null;
    
    
    public static function connect() {
        if(self::$connection == null) {
            try {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$connection;
    }
    
    public static function disconnect() {
        self::$connection = null;
    }
}

?>
