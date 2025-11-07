<?php
include 'db.php';

try {
    $stmt = $conn->query('SELECT COUNT(*) FROM product');
    $count = $stmt->fetchColumn();
    echo "Kết nối thành công! Có $count sản phẩm trong database.";
} catch(PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
}
?>