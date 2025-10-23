
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body>

<form method='get'>
    <label for='text'>Въведи първото поле:</label>
    <input type="text" name="text" id="text" placeholder='Моля въведете първото поле'>
    <label for="text1">Въведи второто поле:</label>
    <input type="text" name="text1" id="text1" placeholder='Моля въведете второто поле'>
    <label for="text2">Въведи третото поле:</label>
    <input type="text" name="text2" id="text2" placeholder='Моля въведете второто поле'>
    <button type="submit">Въведи атрибут</button>
</form>

<?php
    $class_text = '';
    $class_text2 = '';
    $class_text3 = '';

    if (isset($_GET['text'])) {
        $class_text = $_GET['text'];
        $class_text2 = $_GET['text1'];
        $class_text3 = $_GET['text2'];
    }

    class SomeClass {
        public $some_var;
        public $some_var2;
        public $some_var3;

        function __construct($some_var, $some_var2, $some_var3) {
            $this->some_var = $some_var;
            $this->some_var2 = $some_var2;
            $this->some_var3 = $some_var3;
       }
    }

    $some_class = new SomeClass($class_text, $class_text2, $class_text3);

    echo "<div class=result>
            <p>Първо поле:</p>
            <p>$some_class->some_var</p>
            <p>Второ поле:</p>
            <p>$some_class->some_var2</p>

            <p>Трето поле:</p>
            <p>$some_class->some_var3</p>

          </div>";

?>

</html>
</body>