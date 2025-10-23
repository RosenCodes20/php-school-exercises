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
$arr = [];
for ($i = 0; $i <= 100; $i++) {
    $arr[$i] = $i;
}


if ( !isset( $_SESSION['random_arr'] ) )
    $_SESSION['random_arr'] = array();


if ( $_GET ) {

$_SESSION['random_arr'][] = $_GET['number'];



for ($i = 0; $i < 10; $i++) {
    if ($_SESSION['random_arr'][$i] % 2 == 0) {
        echo "<p style=color:red>" . $_SESSION['random_arr'][$i] . "</p>";
    } 
    
    else {
        echo "<p>" . $_SESSION['random_arr'][$i] . "</p>";
    }
}
}

?>

</html>
</body>