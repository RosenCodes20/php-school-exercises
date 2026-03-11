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

    if (isset($_POST['add_cart'])) {
        $foundProduct = [];
        $sql = "SELECT * FROM products WHERE id=?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$_POST['product_id']]);

        $foundProduct = $stmt->fetch();

        $foundId = $foundProduct['id'];

        $addToCartSql = "INSERT INTO cart (productId)
                        VALUES (?)";

        $stmtAddToCart = $connection->prepare($addToCartSql);
        $stmtAddToCart->execute([$foundId]);
    }
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

            <form method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit" name="add_cart" class="add_cart">Добави в количката</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
