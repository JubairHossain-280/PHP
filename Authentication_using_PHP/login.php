<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="typewriter2">
        <h1>Login</h1>
    </div>
    <form action="" method="POST">
        <input type="text" name="name" id="" placeholder="Username" required>
        <input type="password" name="password" id="" placeholder="Password" required>
        <button type="submit" name="login-btn">Login</button>
        <div class="signup-link">Don't have an account?<a href="signup.php"> Create account</a></div>
    </form>
    </div>
    
</body>
</html>


<?php 
    include "connection.php";

    if (isset($_POST['login-btn'])) {
        $name = $_POST['name'];
        $pass = $_POST['password'];

        $if_Account_Exist = "SELECT * FROM `user_info` WHERE `username` = '$name'";
        $exe_if_Account_Exist_query = mysqli_query($con, $if_Account_Exist);

        $check_num_rows = mysqli_num_rows($exe_if_Account_Exist_query);
        // Check if the user exist
        if ($check_num_rows > 0) {
            $db_row = mysqli_fetch_array($exe_if_Account_Exist_query);
            // Compare given password and user password
            $verify_password = password_verify($pass,$db_row['password']);

            if ($verify_password) {
                $_SESSION['username'] = $db_row['username']; 
                ?>
                    <script>
                        alert("Login Successful");
                        location.replace("home.php");
                    </script>
                <?php
            }
            else {
                ?>
                    <script>
                        alert("Incorrect Password");
                        location.replace("login.php");
                    </script>
                <?php
            } 
        }
        else {
            ?>
                <script>
                    alert("Account was not found. You need to Signup first");
                    location.replace("login.php");
                </script>
            <?php
        }
    }
?>