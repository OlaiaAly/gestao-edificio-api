<?php

namespace app\model;

class Payment extends Connection
{
    public function __construct()
    {
        $this->table_name = "payment";
    }

    public function store($rent, $month, $reference, $paymentdata, $mpesa_number)
    {
        $query = "INSERT INTO ".$this->table_name." VALUES (:id, :rent, :month, :ref, :paydata, :mpesa)";

        $params = [
            ":id"=>NULL,
            ":rent"=>$rent,
            ":month"=>$month,
            ":ref"=>$reference,
            ":paydata"=>$paymentdata,
            ":mpesa"=>$mpesa_number
        ];
        $this->prepareQuery($query);
        $this->executeQuery($params);
    }
    public function getByRent($rent)
    {
        $query = "SELECT *FROM ".$this->table_name." WHERE _rent=:rent";
        $params = [":rent"=>$rent];
        $this->list($query,$params, false);
    }

}