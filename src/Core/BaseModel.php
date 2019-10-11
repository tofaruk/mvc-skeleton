<?php

namespace App\Core;

use Psr\Log\NullLogger;

abstract class BaseModel
{
    /** @var \PDO */
    protected $db;
    protected $table = null;
    protected $log = null;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->db = $db->getConnection();
        $this->log = new Log();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        try {
            $statement = $this->db->query("SELECT * FROM " . $this->table);
           return $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            $error = array("info" => $e->getMessage());
        } catch (\Exception $e) {
            $error = array( "info" => $e->getMessage());
        }
        $this->log->error(__METHOD__, $error);
        return ;
    }
}