<?php
    $servername = "127.0.0.1";
    $username = "myuser";
    $password = "mypassword";
    $database = "cartPhp";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "SELECT * FROM products";
    $products = $connection->query($sql)->fetchAll();
?>

<html>
<head>
    <link rel="stylesheet" href="products.css">
</head>

<body>
    <a class="cart" href="cart.php">Количка</a>
    <div class="products">
        <?php foreach ($products as $product): ?>
        <div class="item-product">
                <?php echo "<img src=" . $product["image"] . ">";?>
                <?php echo "<h4>" . $product['productName'] . "</h4>";?>
                <?php echo "<p>" . $product['productDescription'] . "</p>";?>

            <a class="add_cart">Добави в количката</a>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
