<?php

namespace App\Core;

class Database
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        // TODO change the hostname 
        $this->conn = new \PDO(
            sprintf("mysql:host=%s; dbname=%s", Config::get('DB_HOST'), Config::get('DB_NAME')),
            Config::get('DB_USER'),
            Config::get('DB_PASS')
        );
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}