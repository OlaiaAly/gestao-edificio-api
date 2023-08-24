<?php
header('Access-Control-Allow-Orign: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Autorization, X-Requested-With');
header('Conyrnt-Type: application/json; charset=utf-8');

include_once './vendor/autoload.php';

use CoffeeCode\Router\Router;
// echo URLBASE;
$router = new Router(URLBASE);
$router->namespace("App\\controller");

// BUILDING
$router->get('/get-buildings','BuildingController:getBuildings');
$router->get('/get-building/{id}','BuildingController:getById');
$router->post('/store-building','BuildingController:store');
$router->get('/edit-building/{id}','BuildingController:edit');
$router->get('/delete-building/{id}','BuildingController:delete');

// APARTMENTS
$router->get('/get-apartments','ApartmentsController:get');
$router->get('/get-apartment/{id}','ApartmentsController:getById');
$router->get('/get-apartmentsByBuilding/{idBuilding}','ApartmentsController:getByBuildingId');
$router->post('/store-apartment','ApartmentsController:store');
$router->get('/edit-apartment/{id}','ApartmentsController:edit');
$router->get('/delete-apartment/{id}','ApartmentsController:delete');

// PAYMENT
$router->get('/get-payments','PaymentController:get');
$router->get('/get-payment','PaymentController:getById');
$router->get('/get-payments-by-rent/{idRent}','PaymentController:getByRent');
$router->post('/store-payments','PaymentController:store');

// CLIENT 
$router->get('/get-clients','ClientController:get');
$router->get('/get-client/{id}','ClientController:getById');
$router->post('/store-client','ClientController:store');
$router->get('/edit-client/{id}','ClientController:edit');

// RENT
$router->get('/get-rents','RentController:get');
$router->get('/get-rent/{id}','RentController:getById');
$router->post('/store-rent','RentController:store');
$router->get('/get-rent-by-client/{idClient}','RentController:getByClient');


$router->dispatch();
$route = [
"building"=>
    [
        "get-building/id",
        "get-buildings",
        "store-building",
        "update-building",
        "delete-building",
    ],

"apartments" =>
    [
        "get-apartment/id",
        "get-apartments",
        "get-apartments/id-building",
        "get-apartment/id-building",
        "store-apartments",
        "update-apartment",
        "delete-apartment"
    ],
"payments" =>
    [
        ""
    ]
];

