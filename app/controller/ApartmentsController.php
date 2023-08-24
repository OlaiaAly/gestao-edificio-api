<?php

namespace App\controller;
use App\model\Apartment;

class ApartmentsController
{
    public function store()
    {
        $building = $_POST['idBuilding'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $price = $_POST['price'];

    }
    public function get()
    {
        $apartment = new Apartment();
        $data = $apartment->get();
        echo printJson($data);
    }
    public function getById($id)
    {

    }
    public function getByBuildingId($idBuilding)
    {
        $apartment = new Apartment();
        $data = $apartment->getByBuilding($idBuilding);

        echo printJson($data);
    }
    public function edit($id)
    {
        $apartment = new Apartment();
        $apartment->edit($id['id']);
    }
    public function delete($id)
    {
        
    }
}