<?php
    $servername = "127.0.0.1";
    $username = "myuser";
    $password = "mypassword";
    $database = "products";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $stmt = $connection->prepare("SELECT productType, 
       productImageLink, productsCount, productProducer FROM product");
    $stmt->execute();
    $products = $stmt->fetchAll();
    echo "<section class='sell-items'>";
    foreach ($products as $product) {
            echo "<section class='item-for-sale'>";
                echo "<img src='$product[productImageLink]'>";
                echo "<div class='text-items'>";
                    echo "<h2>$product[productType]</h2>";

                    echo "<p>Products count: $product[productsCount]</p>";

                    echo "<p>Product producer: $product[productProducer]</p>";

                    echo "<a class='step-links-buttons'>Виж повече</a>";
                echo "</div>";
            echo "</section>";
    }
    echo "</section>";
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
      <a href=""></a>
    </body>
</html>