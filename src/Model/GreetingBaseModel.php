<?php

namespace App\Model;


use App\Config\Database;
use App\Core\BaseModel;

class GreetingBaseModel extends BaseModel
{
    private $table = 'greeting';

    public function getAll()
    {
        $statement = $this->_db->query("SELECT * FROM " . $this->table);
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }
}