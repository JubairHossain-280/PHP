<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="signup-title">
            <h1 class="typewriter">Sign Up</h1>
        </div>
        <form action="" method="POST">
            <div class="input-field">
                <input type="text" name="username" id="username" autocomplete="off" required>
                <label for="username">Username</label>
            </div>
            <div class="input-field">
                <input type="email" name="email" id="email" autocomplete="off" required>
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" required>
                <button type="button" class="show-btn"><i class="fa-solid fa-eye-slash"></i></button>
                <label for="password">Password</label>
            </div>
            <div class="input-field">
                <input type="password" name="cpassword" id="cpassword" required>
                <button type="button" class="show-btn"><i class="fa-solid fa-eye-slash"></i></button>
                <label for="cpassword">Confirm Password</label>
            </div>
            <div class="input-field">
                <input type="date" name="birthdate" id="birthdate" required>
                <label for="birthdate">Date of Birth</label>
            </div>
            <div class="input-field">
                <img src="bangladesh.png" alt="country_flag">
                <label class="phone" for="phone">+880</label>
                <input type="number" name="phone" id="phone" required>
            </div>
            <button class="submit-btn" type="submit" name="signup-btn">Signup</button>
            <div class="login-link">Already have an account?<a href="login.php">Log in</a></div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>

<?php
include "connection.php";

if (isset($_POST['signup-btn'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];

    // Checking if an account was created with the same email
    $check_already_has_account = "SELECT * FROM `user_info` WHERE `email` = '$email'";
    $exe_check_already_has_account = mysqli_query($con, $check_already_has_account);

    // Count the number of rows that had already exist the email
    $check_row_count = mysqli_num_rows($exe_check_already_has_account);

    // if exist or $check_row_count = 0 then exit
    if ($check_row_count > 0) {
        ?>
        <script>
            alert("Account already exist with this information");
        </script>
        <?php
    }
    // else check the password and confirm password equation
    else {
        // if not equal then exit
        if ($password != $cpassword) {
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
            $exe_create_account_query = mysqli_query($con, $create_account_query);

            if ($exe_create_account_query) {
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