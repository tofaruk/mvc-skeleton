<?php
namespace App\Shared;


use App\Config\Database;

class Greeting
{
    /** @var \PDO  */
    protected $dbConnection;

    public function __construct(Database $database)
    {
        $this->dbConnection = $database->getConnection();
    }
    public function welcome($name=null)
    {
        return "Welcome ".$name;
    }

    public function hello($name=null)
    {
        return "Hello ".$name;
    }

    public function hi($name=null)
    {
        return "Hi ".$name;
    }

    public function getAll($name=null)
    {
        $greetings = [];
        $statement = $this->dbConnection->query("SELECT * FROM greetings");
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        foreach ($rows as $row){
            $greetings[] = $row->name." ".$name;
        }
        return $greetings;
    }
}