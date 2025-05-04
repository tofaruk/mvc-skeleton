<?php

namespace App\Core;

use Psr\Log\NullLogger;

abstract class BaseModel
{
    /** @var \PDO */
    protected $db;

    /** @var string|null */
    protected $table = null;

    /** @var Log|null */
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
    public function getAll(): array
    {
        try {
            $statement = $this->db->query("SELECT * FROM " . $this->table);
            return  $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            $error = array("message" => $e->getMessage());
        } catch (\Exception $e) {
            $error = array("message" => $e->getMessage());
        }
        $this->log->error(__METHOD__, $error);
        return [];
    }
}