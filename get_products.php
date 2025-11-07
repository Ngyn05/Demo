<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

include 'db.php';

try {
    // Truy vấn sản phẩm từ Supabase
    $sql = "SELECT * FROM product ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'data' => $products
    ]);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Không thể lấy dữ liệu: ' . $e->getMessage()
    ]);
}
?>
