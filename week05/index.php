<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body>

    
    <form method="post" enctype="multipart/form-data">
        Select file to upload:<br><br>
        <input type="file" name="picture"><br><br>
        <!-- <input type="file" name="picture"><br><br>
        <input type="file" name="picture"><br><br> -->
        <button name="submit" class="btn btn-primary" type="submit" value="submit">Submit</button>
    </form>

</body>
</html>

<?php

    if ( $_POST ) {

        $file = $_FILES['picture'];
        $file_name = $_FILES['picture']['name'];
        $file_temp = $_FILES['picture']['tmp_name'];
        $file_type = $_FILES['picture']['type'];
        
        if ( $file_type != "image/jpeg" && $file_type != "image/png" ) {
            
            echo "Качете jpeg или png снимка<br><br>";
            
        } else {
        
            move_uploaded_file( $file_temp, "images/".$file_name );
        }
    }

    $images = glob("images/*.jpg");

    echo "<div class=images-div>";
    foreach ($images as $image) {
        echo "<img src='$image'><br><br>";
    }
    echo "</div>";
?>