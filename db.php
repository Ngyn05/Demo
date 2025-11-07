<?php
// Thông tin kết nối Supabase PostgreSQL
$host = "db.qhjcwkgvjurdxmcxdgnv.supabase.co";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "Nguyenhuynh@2904";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password;sslmode=require";
    $conn = new PDO($dsn);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CLIENT_ENCODING TO 'UTF8'");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

try {
    $conn = new PDO($dsn);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CLIENT_ENCODING TO 'UTF8'");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
