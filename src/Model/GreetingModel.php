<?php

namespace App\Model;

use App\Config\Database;
use App\Core\BaseModel;

class GreetingModel extends BaseModel
{
    protected $table = 'greeting';

    /**
     * @return array
     */
    public function add($data=[])
    {
        try {
            $statement = $this->db->prepare('INSERT INTO ' . $this->table .
                ' (name) VALUES (:name)');
            $statement->execute($data);
            return true;
        } catch (\PDOException $e) {
            $error = array("info" => $e->getMessage());
        } catch (\Exception $e) {
            $error = array("info" => $e->getMessage());
        }
        $this->log->error(__METHOD__, $error);
        return;
    }
}