

<div class="grid-container">
<?php

$servername = "localhost";
$username = "luka";
$password = "kobe8K24";
$dbname = "scandiweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname[1]);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "Connected successfully";
}

// Close connection

$sql = "SELECT sku, name, price, type, dvd_size, book_weight, furniture_height, furniture_width, furniture_length  FROM `products-2` WHERE 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="grid-item">';
        echo '<input type="checkbox" class="item-checkbox" />';
        echo '<div>' . htmlspecialchars($row["sku"]) . '</div>';
        echo '<div>' . htmlspecialchars($row["name"]) . '</div>';
        echo '<div>' . htmlspecialchars($row["price"]) . '</div>';
        

        if ($row["type"] === "dvd") {
            echo '<div>Size: ' . htmlspecialchars($row["dvd_size"]) . ' MB</div>';
        } elseif ($row["type"] === "book") {
            echo '<div>Weight: ' . htmlspecialchars($row["book_weight"]) . ' Kg</div>';
        } elseif ($row["type"] === "furniture") {
            echo '<div>Height: ' . htmlspecialchars($row["furniture_height"]) . ' CM</div>';
            echo '<div>Width: ' . htmlspecialchars($row["furniture_width"]) . ' CM</div>';
            echo '<div>Length: ' . htmlspecialchars($row["furniture_length"]) . ' CM</div>';
        }

        echo '</div>';
    }
} else {
    echo "No records found";
}

$conn->close();

?>
</div>