<?php
// Thông tin kết nối Supabase PostgreSQL từ biến môi trường
$host = getenv('SUPABASE_HOST') ?: '';
$port = getenv('SUPABASE_PORT') ?: '5432';
$dbname = getenv('SUPABASE_DB') ?: 'postgres';
$user = getenv('SUPABASE_USER') ?: '';
$password = getenv('SUPABASE_PASSWORD') ?: '';

// Tạo DSN; đặt sslmode=require vì Supabase yêu cầu kết nối an toàn
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

// Tạo PDO connection. Không in/kill process ở đây — để caller (endpoint) bắt lỗi
$conn = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$conn->exec("SET CLIENT_ENCODING TO 'UTF8'");
?>
