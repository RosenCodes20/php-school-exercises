<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="login-div">
        <p>Login admin site</p>
        <div class="btns-div">
        <?php
            session_start();
            if (!$_SESSION) {
                echo '<a href="./login.php">Login</a>';
            } else {
                echo "<p class='p-text'>Hi, " . $_SESSION['user']['email'] . "</p>";

                echo '<a href="./logout.php">Logout</a>';
            }
        ?>
        <a href="./register.php">Register</a>
        </div>
        </div>
    </body>
</html>