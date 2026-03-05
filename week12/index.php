<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form action="" method="post">
            <h1>Примерна регекс форма</h1>
            <input type="text" name="email" id="email" placeholder="Въведи твоя имейл........." required>
            <input type="text" name="name" id="name" placeholder="Въведи твоето име и фамилия........" required>

            <button>Предай</button>
        </form>
    </body>

    <?php
        $email = "";
        $name = "";
        
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $patternForEmail = "/[A-Za-z0-9]+@[a-z]+(-[a-z]+)?\.[a-z]+/";

            $matchForEmail = preg_match($patternForEmail, $email);

            echo "<div class=container>";
            if (!$matchForEmail) {
                echo "<p class='wrongEmail'>Неправилно въведен имейл!</p>";
            } else {
                echo "<p class='rightEmail'>Правилен имейл!</p>";
            }
        }

        if (isset($_POST["name"])) {
            $name = $_POST["name"];

            $patternForName = "/[A-Z][a-z]+(-[A-Z][a-z]+)?\s[A-Z][a-z]+/";
        
            $match = preg_match($patternForName, $name);

            if (!$match) {
                echo "<p class='wrongName'>Въведеното име е грешно!</p>";
            } else {
                echo "<p class='rightName'>Правилно проверено име!</p>";
            }

            echo "</div>";
        }
    ?>
</html>