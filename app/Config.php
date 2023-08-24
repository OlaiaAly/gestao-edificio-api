<?php
const URLBASE = "http://localhost/flutter-api";
const DBNAME = "flutter-api";
const HOST = "localhost";
const PORT = "3306";
const USERNAME = "root";
const PASSWORD = "";

const MPESA_API = "";
const MPESA_PUBLIC_KEY = "";

function printJson($data, $is_printable=true)
{
    return ($is_printable) ? 
    json_encode(['code'=>1,'result'=> $data]) :
    json_encode(['code'=>0, 'message'=>$data]);
}