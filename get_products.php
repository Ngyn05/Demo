<?php
include 'db.php';

$sql = "SELECT * FROM product ORDER BY id DESC";
$result = $conn->query($sql);

$products = [];
while($row = $result->fetch_assoc()){
  $products[] = $row;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($products);
?>
