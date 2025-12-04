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
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $connection->prepare("SELECT * FROM admins WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);

        $user = $stmt->fetch();

        print_r($user);
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
            <label for="username">Имейл:</label>
            <input type="email" name="email" id="username" class="email" placeholder="Въведи твоя имейл......">
            <label for="pass">Парола:</label>
            <input type="password" name="password" id="pass" class="password" placeholder="Въведи твоята парола.......">

            <button class="login-btn">Вход</button>
        </form>
    </article>
    </body>
</html>