<?php

namespace App\Model;

use App\Config\Database;
use App\Core\BaseModel;

class CommentModel extends BaseModel
{
    protected $table = 'comment';

    /**
     * @param array $data
     * @return bool|void
     */
    public function add($data = [])
    {
        try {
            $statement = $this->db->prepare('INSERT INTO ' . $this->table .
                ' (post_id, content,created) VALUES (:post_id,:content, :created)');
            foreach ($data as $d) {
                $statement->execute($d);
            }
            return true;
        } catch (\PDOException $e) {
            $error = array("message" => $e->getMessage());
        } catch (\Exception $e) {
            $error = array("message" => $e->getMessage());
        }
        $this->log->error(__METHOD__, $error);
        return;
    }


    /**
     * @param null $id
     * @return array|mixed|void
     */
    public function getByPostId($id=null)
    {
        try {
            if (!$id) {
                throw new \Exception('Post id should not be null');
            }

            $statement = $this->db->prepare("SELECT * FROM " . $this->table." WHERE post_id=:post_id ;");
            $statement->execute(array(':post_id'=>$id));
            return $statement->fetchAll(\PDO::FETCH_OBJ);

        } catch (\PDOException $e) {
            $error = array("message" => $e->getMessage());
        } catch (\Exception $e) {
            $error = array("message" => $e->getMessage());
        }
        $this->log->error(__METHOD__, $error);
        return;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        try {
            $statement = $this->db->query("SELECT * FROM " . $this->table." ORDER BY created ASC");
            return $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            $error = array("message" => $e->getMessage());
        } catch (\Exception $e) {
            $error = array("message" => $e->getMessage());
        }
        $this->log->error(__METHOD__, $error);
        return;
    }
}