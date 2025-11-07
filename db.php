<?php
$servername = getenv('DB_HOST') ?: "db4free.net";
$username = getenv('DB_USER') ?: "your_username";  // Thay your_username bằng username bạn đăng ký
$password = getenv('DB_PASSWORD') ?: "your_password";  // Thay your_password bằng password bạn đăng ký
$dbname = getenv('DB_NAME') ?: "your_database";  // Thay your_database bằng tên database bạn đăng ký

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
