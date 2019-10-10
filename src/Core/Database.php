<?php

namespace App\Core;

class Database
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = new \PDO(
            sprintf("mysql:host=%s; dbname=%s", DB_HOST, DB_NAME),
            DB_USER,
            DB_PASS
        );
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