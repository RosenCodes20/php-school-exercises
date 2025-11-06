<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<form method="post" <?php if ( isset( $_POST['submit'])) echo "class='br-fix'" ?>>
    <label for="name">Въведи име на човека:</label>
    <input type="text" name='name' id='name' placeholder="Въведи име на човека......" required>

    <label for="age">Въведи години на човека:</label>
    <input type="age" name="age" id="age" placeholder="Въведи години на човека......" required>

    <button name="submit" value="submit" type="submit">Въведете човек</button>

</form>
</body>
</html>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "rootpassword";
$database = "school_exercises";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         echo "Connected successfully";
} catch(PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['submit'])) {
    $name = '';
    $age = '';

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    }

    // class Person {
    //     public $name;
    //     public $age;

    //     function __construct($name, $age) {
    //         $this->$name = $name;
    //         $this->$age = $age;
    //     }
    // }

    // $person = new Person($name, $age);

    $sql = "INSERT INTO person (personName, age) VALUES (?, ?)";
    $connection->prepare($sql)->execute([$name, $age]);

//    echo "<div class='result'>";
//    echo "<p>Успешно създадохте нов човек в базата данни!</p>";
//    echo "<p>С име: $name</p>";
//    echo "<p>На: $age години</p>";
//    echo "</div>";
}

$stmt = $connection->query("SELECT * FROM person");
$person = $stmt->fetchAll();

$peopleArr = array(

);

if (!$person) {
    echo "<div class='people'>" . "<p class='p-nth-base'>Няма нищо в базата все още<i class='fa-solid fa-face-frown'></i></p>" . "</div>";
} else {

    echo "<div class='people'>";
    foreach ($person as $people) {
//    echo "Person id: " . $people['id'] . "<br>";
//    echo "Person name: " . $people['personName'];
        if (!isset($peopleArr[$people['personName']])) {
            $peopleArr[$people['personName']] = 1;
        } else {
            $peopleArr[$people['personName']]++;
        }
    }

    foreach ($peopleArr as $personName => $personCount) {
        if ($personCount == 1) {
            echo "<p>" . $personName . " се среща в базата " . $personCount . " път" . "</p>";
        } else {
            echo "<p>" . $personName . " се среща в базата " . $personCount . " пъти" . "</p>";
        }
    }
    echo "</div>";
}
?>
