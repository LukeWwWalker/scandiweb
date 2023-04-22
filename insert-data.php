<?php
include 'productdata.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $size = isset($_POST['dvd_size']) ? $_POST['dvd_size'] : null;
    $weight = isset($_POST['book_weight']) ? $_POST['book_weight'] : null;
    $height = isset($_POST['furniture_height']) ? $_POST['furniture_height'] :  null;
    $width = isset($_POST['furniture_width']) ? $_POST['furniture_width'] : null;
    $length = isset($_POST['furniture_length']) ? $_POST['furniture_length'] : null; 

    $sql = "INSERT INTO `products-2` (sku, name, price, type, dvd_size, book_weight, furniture_height, furniture_width, furniture_length ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $sku);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $type);
        $stmt->bindParam(5, $size);
        $stmt->bindParam(6, $weight);
        $stmt->bindParam(7, $height);
        $stmt->bindParam(8, $width);
        $stmt->bindParam(9, $length);
        $stmt->execute();
       
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
    
    $conn = null;

    header("Location: index.php"); // Redirect to the main page
    exit();
}
?>

