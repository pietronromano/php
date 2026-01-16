<?php

// Database configuration
$host = '127.0.0.1'; // NOTE: localhost didn't work from MacOS to Docker container
$port = 3306;
$dbName = 'blog';
$username = 'root';
$password = 'Axml-xsl0123';

// Connection string (DSN)
$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try {
  // Create a PDO instance
  $pdo = new PDO($dsn, $username, $password);

  // Set PDO to throw exceptions on error
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Database Connected...";

  // You are now connected to the database, and $pdo contains the connection object

  // You can perform database operations here

} catch (PDOException $e) {
  // If there is an error with the connection, catch it here
  echo "Connection failed: " . $e->getMessage();
}
