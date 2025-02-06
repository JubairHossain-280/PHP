<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="typewriter">
        <h1>Sign Up</h1>
    </div>
    <form action="" method="POST">
        <input type="text" name="username" id="" placeholder="Username" required>
        <input type="email" name="email" id="" placeholder="Email" required>
        <input type="password" name="password" id="" placeholder="Password" required>
        <input type="password" name="cpassword" id="" placeholder="Confirm Password" required>
        <input type="date" name="birthdate" id="" placeholder="">
        <input type="number" name="phone" id="" placeholder="Phone">
        <button type="submit" name="signup-btn">Signup</button>
        <div class="login-link">Already have an account?<a href="login.php">Log in</a></div>
    </form>
    </div>
</body>
</html>

<?php 
    include "connection.php";

    if(isset($_POST['signup-btn'])) {
        $name = $_POST['username'];
        $email = $_POST['email']; 
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];

        // Checking if an account was created with the same email
        $check_already_has_account = "SELECT * FROM `user_info` WHERE `email` = '$email'";
        $exe_check_already_has_account = mysqli_query($con , $check_already_has_account);

        // Count the number of rows that had already exist the email
        $check_row_count = mysqli_num_rows($exe_check_already_has_account);

        // if exist or $check_row_count = 0 then exit
        if($check_row_count > 0) {
            ?>
            <script>
                alert("Account already exist with this information");
            </script>
            <?php
        }
        // else check the password and confirm password equation
        else {
            // if not equal then exit
            if($password != $cpassword) {
                ?>
                <script>
                    alert("Please check the password and confirm password again!");
                </script>
                <?php
            }
            // else Encrypt the password and execute insert query and create the account
            else {
                $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

                $create_account_query = "INSERT INTO `user_info`( `username`, `email`, `password`, `birthdate`, `phone`) VALUES ('$name','$email','$encrypted_password','$birthdate','$phone')";
                $exe_create_account_query = mysqli_query($con , $create_account_query);

                if($exe_create_account_query) {
                    ?>
                    <script>
                        alert("Account has create successfully");
                    </script>
                    <?php
                }
                // if there any problem in execution show the message and exit
                else {
                    ?>
                    <script>
                        alert("Something went wrong. Please try again later");
                    </script>
                    <?php
                }
            }
        }
    }
?>