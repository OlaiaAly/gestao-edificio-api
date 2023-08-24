<?php
namespace App\model;

class Apartment extends Connection
{
    public function __construct()
    {
        $this->table_name = "apartment";
    }
    public function store($idBuilding, $name, $number, $price)
    {
        $query = "INSERT INTO ".$this->table_name." VALUES (:id, :idBuilding, :name, :num, :status, :price)";

        $params = [
            ":id" => NULL,
            ":idBuuilding" => $idBuilding,
            ":name" => $name,
            ":num" => $number,
            ":status" => 0,
            ":price" => $price
        ];
        $this->prepareQuery($query);
        $this->executeQuery($params);
    }

    public function getByBuilding($idBuilding)
    {
        $query = "SELECT *FROM apartment WHERE _idbuilding=:id";
        $params = [":id"=>$idBuilding];
        return $this->list($query,$params,false);
    }
    public function edit($id)
    {
        $params=
        [
            ':id'=>$id,
        ];
         $subQuery = "";
        $this->update($id,$subQuery, $params);
    }
}