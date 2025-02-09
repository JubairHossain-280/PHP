<?php 
    session_start();

    if(!isset($_SESSION["username"])) {
        ?>
            <script>
                alert("You need to log in first");
                location.replace("login.php");
            </script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="homepage-title">
        <h1 class="typewriter2">Welcome to our Home Page</h1>
    </div>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Service</a></li>
        </ul>
        <a href="logout.php" class="logout-btn">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </nav>
    
</body>
</html>