<?php 
    include "connection.php";

    $select_id = $_GET["v"];

    $delete_query = "DELETE FROM `details` WHERE `id` = $select_id";
    $exe_delete = mysqli_query($connection, $delete_query);

    if($exe_delete){
        ?>
        <script>
            alert("Successfully Deleted");
            location.replace("show.php");
        </script>

        <?php
    }
?>