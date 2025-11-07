<?php
$host = getenv('SUPABASE_HOST');
$port = getenv('SUPABASE_PORT') ?: "5432";
$dbname = getenv('SUPABASE_DB');
$user = getenv('SUPABASE_USER');
$password = getenv('SUPABASE_PASSWORD');

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $conn = new PDO($dsn);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CLIENT_ENCODING TO 'UTF8'");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
