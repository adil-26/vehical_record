<?php
// Render PostgreSQL connection credentials
$host = 'dpg-ct0q233tq21c73ehkgr0-a';
$port = '5432';
$dbname = 'vrsdb';
$user = 'vrsdb_user';
$password = 'OtOjc7C7MwC5xxlkdyJE6BWzdQxVr9U7';

try {
    // DSN (Data Source Name) for PostgreSQL
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set default fetch mode
    ]);
    
    echo "Database connected successfully!";
} catch (PDOException $e) {
    // Handle connection error
    echo "Connection failed: " . $e->getMessage();
}
?>
