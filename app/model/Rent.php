<?php

namespace App\model;

class Rent extends Connection
{
    public function __construct()
    {
        $this->table_name = "rent";
    }
    public function store($constumer, $apartment, $created_at, $paymentDate, $price)
    {
        $query = "INSERT INTO ".$this->table_name." VALUES (:id, :constumer, :apartment, :created_at, :paydata, :price, :status)";

        $params = [
            ":id"=>NULL,
            ":constumer"=>$constumer,
            ":apartment"=>$apartment,
            ":created_at"=>$created_at,
            ":paydata"=>$paymentDate,
            ":price"=>$price,
            ":status"=>0
        ];
        $this->prepareQuery($query);
        $this->executeQuery($params);
    }
    public function getByClient($idClient)
    {
        $query = "SELECT *FROM rent WHERE _costumer=:cost";
        $params = [":cost"=>$idClient];
        return $this->list($query, $params);
    }
}