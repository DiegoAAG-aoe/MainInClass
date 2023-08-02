<?php

    $con = mysqli_connect("localhost","root","","InClass");
    $sql = "SELECT * FROM `recordatorio`";
    $all_categories = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">   
</head>

<!--Se genera la lista a medida que el while recorre los datos seleccionados en el select. -->
<body>
    <form method="POST">
        <select name="recordatorio">
            <?php       
                while ($recordatorio = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $recordatorio["Rec_Id"];
                ?>">
                    <?php echo $recordatorio["Rec_Id"];
                    ?>
                </option>
            <?php
                endwhile;
            ?>
        </select>
        <br>
        
    </form>
    <br>
</body>
</html>