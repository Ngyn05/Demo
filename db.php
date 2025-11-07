<?php
// db.php - use environment variables when available (for Render deployment)

// Read from environment first; fall back to local hardcoded values for dev
$host = getenv('SUPABASE_HOST') ?: 'db.qhjcwkgvjurdxmcxdgnv.supabase.co';
$port = getenv('SUPABASE_PORT') ?: '5432';
$dbname = getenv('SUPABASE_DB') ?: 'postgres';
$user = getenv('SUPABASE_USER') ?: 'postgres';
$password = getenv('SUPABASE_PASSWORD') ?: 'Nguyenhuynh@2904';

// Build DSN and create PDO
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

$conn = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
]);

$conn->exec("SET CLIENT_ENCODING TO 'UTF8'");
?>
