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
    $products = $stmt->fetch();

    foreach ($products as $product) {
        echo($product);
        echo "<section class='sell-items'>";
            echo "<section class='item-for-sale'>";
                echo "<img src=''>";
                echo "<div class='text-items'>";

                echo "</div>";
            echo "</section>";
        echo "</section>";
    }
?>