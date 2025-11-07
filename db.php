<?php
// Thông tin kết nối Supabase PostgreSQL
$host = "db.qhjcwkgvjurdxmcxdgnv.supabase.co";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "Nguyenhuynh@2904";

// Tạo DSN; đặt sslmode=require vì Supabase yêu cầu kết nối an toàn
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

// Tạo PDO connection. Không in/kill process ở đây — để caller (endpoint) bắt lỗi
$conn = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$conn->exec("SET CLIENT_ENCODING TO 'UTF8'");
?>
