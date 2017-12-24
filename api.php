<?php
/**
 * Created by PhpStorm.
 * User: mohan
 * Date: 12/24/17
 * Time: 10:34 AM
 */
namespace FleetManagement;
include_once('Models/Devices.php');




$method = $_SERVER['REQUEST_METHOD'];
$arr_request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

$api = $arr_request[0];
if(ucfirst($api) != 'Devices'){
    http_response_code(404);
}else{
    $connection = new \PDO('mysql:host=localhost;dbname=fleet', 'root', 'mysql');
    $obj = new Models\Devices($connection);
    $return = $obj->getDevices();

    http_response_code(200);
    header("HTTP/1.1 200 OK");
    header('Content-Type: application/json');
    echo json_encode($return);
}
