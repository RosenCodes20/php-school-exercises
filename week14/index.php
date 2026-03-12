<html>
<head>

    <title>HI</title></head>

<body>
    <h1>API</h1>
</body>
</html>

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


    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == "GET") {
        $sqlSelect = "SELECT * FROM products";

        $products = $connection->query($sqlSelect)->fetchAll();

        echo json_encode($products);
    }
?>