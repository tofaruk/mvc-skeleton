<?php

namespace App\Config;


class Database
{
    private static $instance = null;
    private $conn;
    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = 'root';
    private $name = 'raw-to-advance-php';

    private function __construct()
    {
        $this->conn = new \PDO(
            "mysql:host={$this->host}; dbname={$this->name}",
            $this->user,
            $this->pass
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