<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="login-title">
        <h1 class="typewriter">Login</h1>
    </div>
    <form action="" method="POST">
        <div class="input-field">
            <input type="text" name="name" id="name" autocomplete="off" required>
            <label for="name">Username</label>
        </div>
        <div class="input-field">
            <input type="password" name="password" id="password" required>
            <button type="button" class="show-btn"><i class="fa-solid fa-eye-slash"></i></button>
            <label for="password">Password</label>
        </div>
        <button class="submit-btn" type="submit" name="login-btn">Login</button>
        <div class="signup-link">Don't have an account?<a href="signup.php"> Create account</a></div>
    </form>
    </div>
    

    <script src="script.js"></script>
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