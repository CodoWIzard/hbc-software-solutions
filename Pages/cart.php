<?php
session_start();

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $itemId = $_POST['id'];
    $quantity = $_POST['quantity'] ?? 1;

    // Check if item already exists in cart
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId] += $quantity;
    } else {
        $_SESSION['cart'][$itemId] = $quantity;
    }

    echo json_encode(['success' => true, 'cart' => $_SESSION['cart']]);
    exit;
}
?>
