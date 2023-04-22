<?php include 'connection.php'; ?>
  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="head">
      <h1>Product List</h1>
      <div class="btn">
        <form class="add" action="add-product.php">
          <button type="submit" value="Add">Add</button>
          </form>
        <!-- <button>Add</button> -->
<form    action="delete-products.php"  method="POST">
  <button type="submit" value="Mass Delete">Mass Delete</button>
</form>
        
      </div>
    </div>
    <div class="full-grid">
      <div class="grid-container">
    <?php
      $sql = "SELECT sku, name, price, type, dvd_size, book_weight, furniture_height, furniture_width, furniture_length  FROM `products-2` WHERE 1";
      $result = $conn->query($sql);
      

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
          
          
            echo '<div class="grid-item">';
            echo '<input type="checkbox"  name="delete[]"  class="item-checkbox"  value="' . $row['sku'] . '" />';
            echo '<div>' . htmlspecialchars($row["sku"]) . '</div>';
            echo '<div>' . htmlspecialchars($row["name"]) . '</div>';
            echo '<div>' . htmlspecialchars($row["price"]) . ' $' .'</div>';
            

            if ($row["type"] === "dvd") {
                echo '<div>Size: ' . htmlspecialchars($row["dvd_size"]) . ' MB</div>';
            } elseif ($row["type"] === "book") {
                echo '<div>Weight: ' . htmlspecialchars($row["book_weight"]) . ' Kg</div>';
            } elseif ($row["type"] === "furniture") {
                echo '<div>Dimension: ' . htmlspecialchars($row["furniture_height"]) . 'x' . htmlspecialchars($row["furniture_width"]) . 'x'. htmlspecialchars($row["furniture_length"]) . '</div>';
            }

            echo '</div>';
           
        }
    } else {
        echo "No records found";
    }

    $conn->close();

    ?>
  </div>
</div>
  </body>

  <footer><div>Scandiweb Test assignmet</div></footer>
</html>






