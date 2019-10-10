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
        $result = [];
        try {
            $statement = $this->db->query("SELECT * FROM " . $this->table);
            $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            $result = array("status" => false, "info" => $e->getMessage());
        } catch (\Exception $e) {
            $result = array("status" => false, "info" => $e->getMessage());
        }
        if (isset($result['status']) && $result['status'] === false) {
            $this->log->error(__METHOD__, $result);
        }
        return $result;
    }
}