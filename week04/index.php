<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form method='get'>
        <input name='product_name' type='text' id='product_name' placeholder="Въведи продукт...">
        <input name='product_type' type='text' id='product_type' placeholder="Въведи тип на продукт...">
        <input name='product_price' type='text' id='product_price' placeholder="Въведи цена на продукт...">
        <input name='product_matery' type='text' id='product_matery' placeholder="Въведи материя на продукт...">
        
    
     <select name='product_company' id='product_company'>" . "<option value=''>--избери компания--</option>;
<?php
    $company_name = array("Kaufland"=>"Кауфланд", "Lidl"=>"Лидл", "Fantastiko"=>"Фантастико");
    foreach ($company_name as $key => $value) {
        echo "<option value='$key'>$value</option>";    
    }
?>
    </select>
  

        <button type='submit'>Въведи</button>
    </form>

</body>
</html>

<?php

    $product_name = '';
    $product_type = '';
    $product_price = '';
    $product_matery = '';
    $product_company_field = '';
    
    if (isset($_GET['product_name'])) {
        $product_name = $_GET['product_name'];
    }

    if (isset($_GET['product_type'])) {
        $product_type = $_GET['product_type'];
    }

    if (isset($_GET['product_price'])) {
        $product_price = $_GET['product_price'];
    }

    if (isset($_GET['product_matery'])) {
        $product_matery = $_GET['product_matery'];
    }

    if (isset($_GET['product_company'])) {
        $product_company_field = $_GET['product_company'];
    }

    class Product {
        public $product_name;
        public $product_type;
        public $product_price;
        public $product_matery;
        public $product_company;

        function __construct($product_name, $product_type, $product_price, $product_matery, $product_company) {
            $this->product_name = $product_name;
            $this->product_type = $product_type;
            $this->product_price = $product_price;
            $this->product_matery = $product_matery;
            $this->product_company = $product_company;
        }
    }

  
    $product_object = new Product($product_name, $product_type, $product_price, $product_matery, $product_company_field);

    // $help_var = $company_name[ $product_object -> product_company ];

    // echo "<div class='container'>
    //         <p>Product name: $product_object -> product_name</p>
    //         <p>Product type: $product_object -> product_type</p>
    //         <p>Product price: $product_object -> product_price</p>
    //         <p>Product mastery: $product_object -> product_mastery</p>
    //         <p>Product company: $help_var</p>
    //     </div>
    // ";

    echo "<div class='container'>";
        echo "<br>";
        echo "<p>Име на продукта: " . $product_object -> product_name . "</p>";


        echo "<p>Тип на продукта: " . $product_object -> product_type . "</p>";

        echo "<p>Цена на продукта: " . $product_object -> product_price . "</p>";

        echo "<p>Материя на продукта: " . $product_object -> product_matery . "</p>";

        echo "<p class='last-p'>Компания на продукта: " . $company_name[ $product_object -> product_company ] . "</p>";
    echo "</div>";
?>