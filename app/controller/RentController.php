<?php

namespace app\controller;

class RentController
{
    public function store()
    {
        echo printJson($_POST);
        $constumer = $_POST['idCostumer'];
        $apartment = $_POST['idApartment'];
        // $created_at = times
            // ":paydata"=>$paymentDate,
        $price = $_POST['price']; 
    }

    public function getById($id)
    {

    }
    public function get()
    {

    }
    public function getByClient($idClient)
    {
        
    }
}