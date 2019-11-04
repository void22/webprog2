<?php
    define('HOST', 'localhost');
    define('DATABASE', 'webprog2');
    define('USER', 'root');
    define('PASSWORD', '');
    
    class Database
    {
        private static $connection = FALSE;
        
        public static function getConnection()
        {
            if (!self::$connection) {
                self::$connection = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                self::$connection->query('SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci');
            }

            return self::$connection;
        }
    }
?>