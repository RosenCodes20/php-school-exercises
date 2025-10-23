
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <form method="get">
        <input type="number" name="number" id="number">
        <button type='submit'>Submit</button>
    </form>
    
    
    <?php
        $input = '';
        if (isset($_GET['number'])) {

            $input = $_GET['number'];
        }

        // for ($a = 0; $a <= 1; $a++) {
        //     echo"Lako       ";
        // }



        if ($input) {
            for ($a = 0; $a <= $input; $a++) {
                for ($b = 0; $b <= $input; $b++) {
                    echo "*";
            }
            echo "<br>";
            }
        }       
    ?>
    
</body>
</html>

//<?php

for ($i = 1; $i <= 100; $i++) {

    if ($i % 2 == 0) {
        echo "<p style='color:red'>$i</p>";
    } else {
        echo "<p>$i</p>";
    }

}

?>