<?php
    $con = mysqli_connect("localhost","root","","InClass");
    $sql = "SELECT * FROM `asignatura`";
    $all_categories = mysqli_query($con,$sql);
?>

<select name="asignatura">
    <?php       
        while ($asignatura = mysqli_fetch_array(
                $all_categories,MYSQLI_ASSOC)):;
    ?>
        <option value="<?php echo $asignatura["Asi_ID"];
        ?>">
            <?php echo $asignatura["Asi_Nombre"];
            ?>
        </option>
    <?php
        endwhile;
    ?>
</select>