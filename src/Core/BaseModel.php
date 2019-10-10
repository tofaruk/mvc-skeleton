<?php

namespace App\Core;

abstract class BaseModel
{
    /** @var \PDO */
    protected $db;
    protected $table = null;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->db = $db->getConnection();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $result=[];
        try{
            $statement = $this->db->query("SELECT * FROM " . $this->table);
            $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            $result = array("status"=>false, "info"=>$e->getMessage());
        }catch (\Exception $e) {
            $result = array("status"=>false, "info"=>$e->getMessage());
        }
        return $result;
    }
}