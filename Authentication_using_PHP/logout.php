<?php 
    session_start();

    // if(!isset($_SESSION["username"])) {
    //     ?>
    //         <script>
    //             alert("You need to log in first");
    //             location.replace("login.php");
    //         </script>
    //     <?php
    // }

    session_destroy();
    ?>
        <script>
            alert("Logout Successful");
            location.replace("login.php");
        </script>
    <?php
?>