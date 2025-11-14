<?php
    session_start();
    if (isset($_POST['submit'])) {
        session_destroy();

        header("location: index.php");
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="logout.css">
    </head>
    <body>
        <div class="logout-div">
        <p>Are you sure you want to logout?</p>
        <div class="logout-btns">
        <form action="" method="post">
            <input type="submit" value="Yes" name="submit">
        </form>
        <a class="no-btn" href="javascript:history.back()"><button>No</button></a>
        </div>
        </div>
    </body>
</html>