<?php
require './config/database.php';
$db = (new Database())->connect();

$stmt = $db->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);
?>