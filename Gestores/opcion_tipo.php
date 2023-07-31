<?php

    $con = mysqli_connect("localhost","root","","InClass");
    $sql = "SELECT * FROM `curso`";
    $all_categories = mysqli_query($con,$sql);
?>

        <select name="curso">
            <?php       
                while ($curso = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $curso["Cur_Tipo"];
                ?>">
                    <?php echo $curso["Cur_Tipo"];
                    ?>
                </option>
            <?php
                endwhile;
            ?>
        </select>
