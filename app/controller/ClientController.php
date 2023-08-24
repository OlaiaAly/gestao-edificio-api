<?php

namespace app\controller;
use App\model\Client;
use app\model\Rent;

class ClientController
{
    private $client;
    public function __construct()
    {
        $this->client = new Client();
    }
    public function get()
    {
        $data = $this->client->get();
        echo printJson($data);
    }
    public function getById($id)
    {
        $data = $this->client->get($id);
        echo printJson($data);
    }
    public function store()
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $nuit = $_POST['nuit'];
        
    }
    public function edit($id)
    {
        
    }
}