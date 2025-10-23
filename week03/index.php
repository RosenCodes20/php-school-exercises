<?php
    class Car {
        public $brand;
        public $model;
        public $man_year;

        function __construct($brand, $model, $man_year) {
            $this->brand = $brand;
            $this->model = $model;
            $this->man_year = $man_year;
        }
    }

    $car = new Car("Audi", "A4", "2015");

    echo $car->brand;

    echo "<br>";

    echo $car->model;
    echo "<br>";

    echo $car->man_year;
?>