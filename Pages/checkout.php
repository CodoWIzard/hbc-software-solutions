<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = $_POST['total'];
    $cart = $_SESSION['cart'];
    $orderDetails = json_encode($cart);

    $query = "INSERT INTO orders (details, total) VALUES ('$orderDetails', '$total')";
    if ($conn->query($query)) {
        echo "Order placed successfully!";
        unset($_SESSION['cart']);
    } else {
        echo "Error placing order: " . $conn->error;
    }
    exit;
}
?>
