<?php
namespace App\model;

class Building extends Connection
{
    public function __construct()
    {
        $this->table_name = "building";
    }

    public function store($name, $number, $apartments, $city, $district, $street, $image)
    {
        $query = "INSERT INTO ".$this->table_name." VALUES (:id, :name, :num, :apart, :city, :distr, :street, :img )";

        $params = [
            ":id"=>NULL,
            ":name"=>$name,
            ":num"=>$number,
            ":apart"=>$apartments,
            ":city"=>$city,
            ":distr"=>$district,
            ":street"=>$street,
            ":img"=>$image
        ];
        $this->prepareQuery($query);
        $this->executeQuery($params);
    }

    // public functio
}