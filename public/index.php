<?php
require '../src/config/database.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if ($uri[0] === 'products') {
    require './src/routes/products.php';
} elseif ($uri[0] === 'orders') {
    require'../src/routes/orders.php';
} else {
    http_response_code(404);
    echo json_encode(["message" => "Route not found"]);
}
?>