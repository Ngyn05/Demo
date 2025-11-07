<?php
include 'db.php';

$sql = "SELECT * FROM product ORDER BY id DESC";
$stmt = $conn->query($sql);

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($products);
?>
