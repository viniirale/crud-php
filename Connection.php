<?php
class Connection
{
    private static $connection;
 
    private function __construct()
    {}
 
    public static function getInstance()
    {
        if (is_null(self::$connection)) {
            self::$connection = new \PDO('mysql:host=fugfonv8odxxolj8.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=pqvn5ai28jbaycki', 'qx1kdutgtghybu9u', 'pe8m44ffc458ebxw');
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$connection->exec('set names utf8');
        }
        return self::$connection;
    }
}