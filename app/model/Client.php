<?php
namespace App\model;

class Client extends Connection
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = "costumer";
    }

    public function store($name, $surname, $email, $contact, $nuit)
    {
        $query = "INSERT INTO ".$this->table_name." VALUES (:id, :name, :surname, :email, :contact, :nuit, :status)";
        $params = [
            ":id"=> NULL,
            ":name"=> $name,
            ":surname"=>$surname,
            ":email"=>$email,
            ":contact"=>$contact,
            ":nuit"=>$nuit,
            ":status"=>0
        ];
        $this->prepareQuery($query);
        $this->executeQuery($params);
    }
}
?>