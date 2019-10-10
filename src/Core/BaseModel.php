<?php

namespace App\Core;


use App\Config\Database;

abstract class BaseModel
{
    protected $_db;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->_db = $db->getConnection();
    }
}