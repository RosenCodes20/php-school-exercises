<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a class="cart-btn" href="products.php">Продукти</a>
    <div class="cart">
        <div class="item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCKYey1jZCIVi3Y_BVPBt6ddOE44oECyb35g&s">
            <h4>Портокал</h4>
            <p>Това е просто портокал</p>
            <a><i class="fa-solid fa-x"></i></a>
        </div>

        <div class="item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCKYey1jZCIVi3Y_BVPBt6ddOE44oECyb35g&s">
            <h4>Портокал</h4>
            <p>Това е просто портокал</p>
            <a><i class="fa-solid fa-x"></i></a>
        </div>

        <a class="finish_order">Завърши поръчката</a>
    </div>
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
?>
