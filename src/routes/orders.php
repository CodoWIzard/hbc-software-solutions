<?php
require './config/database.php';
$db = (new Database())->connect();

$stmt = $db->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($orders);
?>