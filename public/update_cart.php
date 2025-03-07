<?php
session_start();

// Get the JSON data from the request
$data = isset($_POST['cart']) ? json_decode($_POST['cart'], true) : [];

// Store the cart in the session
if (!empty($data)) {
    $_SESSION['cart'] = $data;
}

// Redirect back to the order page
header('Location: order.php');
exit();
?>