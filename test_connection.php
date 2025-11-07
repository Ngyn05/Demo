<?php
include 'db.php';

try {
    // Test query
    $stmt = $conn->query('SELECT COUNT(*) FROM product');
    $count = $stmt->fetchColumn();
    echo "Connection successful! Found $count products.";
} catch(PDOException $e) {
    echo "Connection test failed: " . $e->getMessage();
}
?>