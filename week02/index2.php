<?php
    session_start();
?>

<html>
<body>

<form method='get'>
    <label for='number'>Въведете 10 числа</label>
    <input type='number' name='number' id='number'>
    <button type='submit'>Въведи числото</button>
</form>

<?php
    $my_arr = $_SESSION;

    $num = '';
    
    if (isset($_GET['number'])) {
        $num = $_GET['number'];
    }

    
    $num_for_arr = 0;
    $my_arr[$num_for_arr] = $num;

    $num_for_arr++;
    $curr_val = $num_for_arr;

    print_r($my_arr);
    echo $num_for_arr
    
?>

</html>
</body>