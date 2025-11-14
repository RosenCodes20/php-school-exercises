<?php 
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
        $name = '';
        $email = '';
        $message = '';
        $passwrod = '';

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }

        if (isset($_POST['message'])) {
            $message = $_POST['message'];
        }

        $sql = 'INSERT INTO users ( name, email, enteredPassword, message ) VALUES(?, ?, ?, ?)';

        $connection->prepare($sql)->execute([$name, $email, $password, $message]);
        header("location: index.php");
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form method="post">
            <label>Име:</label><br>
            <input type="text" name="name"><br>
            <label>E-mail:</label><br>
            <input type="text" name="email"><br>
            <label for="password">Парола:</label><br>
            <input type="password" name="password" id="password"><br>
            <label>Съобщение:</label><br>
            <textarea name="message" id="" cols="30" rows="10"></textarea><br>
            <input type="submit" name="submit" value="Изпрати">
        </form>

    </body>
</html>