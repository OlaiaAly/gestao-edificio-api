<?php
namespace App\model;
use PDO;

class Connection
{

    private $executor;
    private $pdo;
    protected $table_name;

    public function __construct()
    {
        try
        {
            $this->pdo = $this->connect();
        }catch(Exception $ex)
        {
            echo "Erro ao connectar";
        }   
    }

    private function connect()
    {
        $pdo = new PDO("mysql:host=".HOST.";port=".PORT.";dbname=".DBNAME,USERNAME,PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("set names utf8");
        return $pdo;
    }
    protected function prepareQuery($query)
    {
        $pdo = $this->connect();
        $this->executor = $pdo->prepare($query);
    }
    protected function executeQuery($params = null)
    {
        if($params==null)
        {
            $this->executor->execute();
        }else
        {
            foreach($params as $key => $bind)
            {
                $this->executor->bindValue($key, $bind);
            }
            $this->executor->execute();
        }
        
    }
    public function delete($id)
    {
        $query = "DELETE FROM ".$this->table_name." WHERE id =:id";
        $this->prepareQuery($query);
        $params = [
            ":id"=>$id
        ];
        $this->executeQuery($params);
    }
    public function get($id=null)
    {
        $query = "SELECT *FROM ".$this->table_name;
        $params = null;
        
        if($id)
        {
            $query = $query." WHERE id=:id";
            $params = [
                ":id"=>$id
            ];
        }

        $this->prepareQuery($query);
        $this->executeQuery($params);

        if($id)
        {
            return $this->executor->fetch(PDO::FETCH_ASSOC);
        }
            return $this->executor->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function list($query, $params,$listAll=true)
    {
        $this->prepareQuery($query);
        $this->executeQuery($params);
        if($listAll)
        {
            return $this->executor->fetchAll(PDO::FETCH_ASSOC);
        }
            return $this->executor->fetch(PDO::FETCH_ASSOC);
    }
    protected function update($id, $data, $params)
    {
        $query = "UPDATE ".$this->table_name." SET ".$data." WHERE id=:id";

        echo $query;
    }
    
}