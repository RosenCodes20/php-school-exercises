<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $database = "php";

    try {
      $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $connection -> prepare('SELECT * FROM users WHERE email = ? AND enteredPassword = ?');

        $stmt->execute([ $email, $password ]); 
        $user = $stmt->fetch();
        
        if ($user) {
            $_SESSION['user'] = $user;
            
            header("location: index.php");

            exit;

        } else {
            echo "<b style='color:red;'>Невалидни потребителски данни</b><br><br>";
        }
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br><br>

            <input type="submit" name="submit" value="Submit">
        </form>      
    </body>
</html>