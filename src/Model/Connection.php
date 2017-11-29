<?php
namespace GoLaw\Model;

class Connection
{
    
    private static $conn = null;
    
    public static function getConnection()
    {
        $config = require __DIR__ . '/../../configs/dbConfig.php';
        
        if (is_null(self::$conn)) {
            self::$conn = new \PDO("{$config['db']}:host={$config['host']};dbname={$config['dbName']}", $config['user'], $config['password']);
        }
        
        return self::$conn;
    }
    
}