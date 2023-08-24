<?php
namespace app\controller;
use App\model\Building;

class BuildingController
{
    private $building;

    public function __construct()
    {
        $this->building = new Building();
    }
    public function getBuildings()
    {
        $data = $this->building->get();

        echo printJson($data);
    }
    public function store()
    {
        $name = $_POST['name']; //nome do edificio
        $number = $_POST['number']; //numero do predio
        $apartments = $_POST['apartments']; //numero de apartamentos
        $city = $_POST['city']; //cidade
        $district = $_POST['zone']; //bairro
        $street = $_POST['street']; //rua
        $image = "nao precisa"; //imagem

        try
        {
            $this->building->store($name,$number,$apartments,$city,$district,$street,$image);
            echo printJson("cadastrado com sucesso");
        }catch(Exception $ex)
        {
            $message = "Falha ao cadastrar";
            echo printJson($message,false);
        }
    }
    public function edit($id)
    {
        
    }
    public function getById($id)
    {
        $id = $id['id'];
        $data = $this->building->get($id);
        echo printJson($data);
    }
    public function delete($id)
    {

    }
}
