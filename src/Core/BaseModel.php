<?php

namespace App\Core;

abstract class BaseModel
{
    /** @var \PDO  */
    protected $db;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->db = $db->getConnection();
    }
}