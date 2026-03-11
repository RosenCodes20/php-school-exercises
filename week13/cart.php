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

    if (isset($_POST['delete'])) {
        $deleteSql = "DELETE FROM cart WHERE id = ?";
        $stmt = $connection->prepare($deleteSql);
        $stmt->execute([$_POST["foundProductId"]]);
    }

    $sql = "SELECT c.id,  p.image, p.productName, p.productDescription
            FROM products p
            INNER JOIN cart c
            ON p.id = c.productId";

    $foundCartItems = $connection->query($sql)->fetchAll();
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a class="cart-btn" href="products.php">Продукти</a>
    <div class="cart">
        <?php foreach ($foundCartItems as $item):?>
        <div class="item">
            <img src=<?php echo $item['image'];?>>
            <h4><?php echo $item['productName'];?></h4>
            <p><?php echo $item['productDescription'];?></p>
            <form method="post">
                <input type="hidden" name="foundProductId" value="<?php echo $item['id'];?>">
                <button name="delete" type="submit"><i class="fa-solid fa-x"></i></button>
            </form>
            <a></a>
        </div>
        <?php endforeach; ?>
        <a class="finish_order">Завърши поръчката</a>
    </div>
</body>
</html>
