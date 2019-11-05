<?php
class Connection
{
    private static $connection;
 
    private function __construct()
    {}
 
    public static function getInstance()
    {
        if (is_null(self::$connection)) {
            self::$connection = new \PDO('mysql:host=bmsyhziszmhf61g1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=wzh3jh8on47y3bih', 'y5u16l9arl75jtl5', 'etqheojvzz9suzs8');
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$connection->exec('set names utf8');
        }
        return self::$connection;
    }
}