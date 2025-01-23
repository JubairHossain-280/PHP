<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "demo";

    // Create connection with database
    $connection = mysqli_connect($server, $user, $pass, $db);

    // Check connection
    if($connection) {
        echo "<h1>Connected to database</h1>" . "<h3>". "Database name: " . $db ."</h3>" ;
    }

?>