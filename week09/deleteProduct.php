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

    if (isset($_POST['submit'])) {
        $productType = $_POST['productType'];
        $stmt = $connection->prepare("DELETE FROM product WHERE productType = ?");
        $stmt->execute([$productType]);

    }
?>

<html>
    <head>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
    <article class="login">
        <form method="post">
            <h2>Изтрий продукт</h2>
            <label for="username">Тип на продукта</label>
            <input type="text" id="username" name="productType" class="productType" placeholder="Въведи тип на продукта.....">
            <button class="login-btn" name="submit">Изтрий</button>
        </form>
    </article>
    </body>
</html>
