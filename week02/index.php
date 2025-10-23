<?php
    $arr = [];
    for ($i = 0; $i <= 100; $i++) {
        $arr[$i] = $i;
    }

    $random_arr = array_rand($arr, 10);

    for ($i = 0; $i < 10; $i++) {
        if ($random_arr[$i] % 2 == 0) {
            echo "<p style=color:red>" . $random_arr[$i] . "</p>";
        } 
        
        else {
            echo "<p>" . $random_arr[$i] . "</p>";
        }
    }

?>