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
        $productType = $_POST['email'];
        $productImageLink = $_POST['password'];
        $productsCount = $_POST['id_email'];
        $producer = $_POST['producer'];
        $stmt = $connection->prepare("INSERT INTO product (productType, productImageLink, productsCount, productProducer)
                                            VALUES (?, 'images/' ?, ?, ?)");

        $stmt->execute([$productType, $productImageLink, $productsCount, $producer]);

        header("location: adminCatalog.php");

    }
?>

<html>
    <head>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <article class="login">
            <form method="post">
                <h2>Вход</h2>
                <label for="username">Тип на продукта:</label>
                <input type="text" name="email" id="username" class="email" placeholder="Въведи типа на продукта......">
                <label for="pass">Снимка:</label>
                <input type="file" name="password" id="pass" class="password" placeholder="Въведи твоята парола.......">
                <label for="id_email">Количество:</label>
                <input type="number" name="id_email" id="id_email" class="id_email" placeholder="Въведи количество........">

                <label for="producer">Създател:</label>
                <input name="producer" id="producer" type="text" class="producer" placeholder="Въведи създател.........">
                <button name="submit" class="login-btn">Добави</button>
            </form>
        </article>
    </body>
</html>
