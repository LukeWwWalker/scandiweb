<?php
// Replace the values below with your database connection details
$servername = "localhost";
$username = "luka";
$password = "kobe8K24";
$dbname = "scandiweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>  