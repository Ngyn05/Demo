<?php
// Disable showing PHP errors in output; return JSON instead
error_reporting(E_ALL);
ini_set('display_errors', '0');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

try {
    // Include database connection inside try so connection errors are caught
    require_once 'db.php';

    // Truy vấn sản phẩm từ Supabase
    $sql = "SELECT * FROM product ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'data' => $products
    ]);
} catch(Exception $e) {
    // Return error as JSON (no HTML)
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Không thể lấy dữ liệu: ' . $e->getMessage()
    ]);
}
?>
