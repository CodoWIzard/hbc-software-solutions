<?php
require './config/database.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if ($uri[0] === 'products') {
    require './src/routes/products.php';
} elseif ($uri[0] === 'orders') {
    require './src/routes/orders.php';
} else {
    http_response_code(404);
    echo json_encode(["message" => "Route not found"]);
}

?>





<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Self-Service Kiosk</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <h1>Welcome to Happy Herbivore!</h1>
    <?php include 'menu.php'; ?>
</body>
</html>

<?php include 'footer.php'; ?>
