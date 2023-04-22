<?php 
  $db_host = 'localhost';
  $db_name = 'scandiweb';
  $db_user = 'luka';
  $db_pass = 'kobe8K24';

  //create connection
  try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }
?>
