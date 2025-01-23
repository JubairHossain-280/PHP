<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insert To DB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            width: 100%;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            background-color: #006266;
            padding: 20px 0;
            border-radius: 12px;
            
        }
        .title {
            color: white;
            font-family: sans-serif;
            text-align: center;
        }
        input {
            width: 85%;
            padding: 12px 10px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            background: #079992;
            color: white;
        }
        input::placeholder {
            color: white;
        }
        .btns {
            width: 85%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        button {
            background: transparent;
            cursor: pointer;
            border-radius: 8px;
            border: none;
            padding: 10px 25px;
            font-size: 16px;
            font-weight: bold;
        }
        .submit-btn {
            background: #0984e3;
            border: 2px solid #0984e3;
            color: white;
            transition: all 0.2s ease;
        }
        .submit-btn:hover {
            background:transparent;
            color: #0984e3;
        }
        .reset-btn {
            background: red;
            border: 2px solid red;
            color: white;
            transition: all 0.2s ease;
        }
        .reset-btn:hover {
            background: transparent;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h2 class="title">User Details</h2>
            <input type="text" name="user" id="" placeholder="Username..." required>
            <input type="number" name="number" id="" placeholder="Number..." required>
            <input type="email" name="email" id="" placeholder="E-mail..." required>
            <div class="btns">
                <button name="submit" class="submit-btn" type="submit">Submit</button>
                <button class="reset-btn" type="reset">Clear</button>
            </div>
        </form>
    </div>
</body>
</html>


<?php 
    include "connection.php";

    if(isset($_POST["submit"])) {
        $user_name = $_POST["user"];
        $user_number = $_POST["number"];
        $user_email = $_POST["email"];

        $insert_query = "INSERT INTO `details`(`user`, `number`, `email`) VALUES ('$user_name','$user_number','$user_email')";

        $execute_query = mysqli_query($DB_connection, $insert_query);

        if($execute_query) {
            ?>
            <script>
                alert("Form Submission Successful");
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("Form Submission Unsuccessful");
            </script>
            <?php
        }
    }
?>