<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <style>
        * {
            font-family: "Raleway", serif;
        }
        .container {
            max-width: 576px;
            margin: 70px auto;
            border: 8px double teal;
            border-top-right-radius: 150px;
            border-bottom-left-radius: 150px;
            padding-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        form input {
            width: 60%;
            padding:8px 10px;
            border: 1px solid gray;
            border-radius: 4px;
            font-size: 18px;
        }
        form input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        form input:focus {
            outline: 1px solid teal;
        }
        .select-inputs {
            width: 65%;
            display: flex;
            justify-content: center;
            gap: 45px;
        }
        .select-inputs select{
            padding: 8px 10px;
            border-radius: 4px;
        }
        .select-inputs select:focus{
            outline: 1px solid teal;
        }
        .select-inputs option{
            font-size: 16px;
        }
        h1 {
            text-align: center;
        }
        .update-btn {
            width: 63%;
            padding: 10px 45px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            font-weight: bold;
            color: white;
            background: linear-gradient(90deg,cyan,purple);
            border: none;
        }

        /* Responsive */
        @media only screen and (max-width: 768px) {
            .container {
            border: none;
            padding-bottom: 0;
            padding: 0 15px;
        }
            form input {
            width: 100%;
            padding:8px 10px;
            border: 1px solid gray;
            border-radius: 4px;
            font-size: 18px;
        }
            .select-inputs {
            width: 103%;
            flex-direction:  column;
            gap: 20px;
        }
            .update-btn {
            width: 103%;
        }
            
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update <span style="color: purple">Information</span></h1>
        <form action="" method="POST">
            <?php
            include "connection.php";

            $get_id = $_GET['v2'];
            $select_query = "SELECT * FROM `details` WHERE `id` = $get_id";
            $exe_select = mysqli_query($connection, $select_query);
            $final_data = mysqli_fetch_array($exe_select);

            ?>
            <input type="text" name="name" id="" required placeholder="Student Name..."
                value="<?php echo $final_data['name'] ?>">
            <input type="number" name="roll" id="" required placeholder="Student Roll..."
                value="<?php echo $final_data['roll'] ?>">
            <input type="number" name="registration" id="" required placeholder="Student Registration..."
                value="<?php echo $final_data['registration'] ?>">
            <input type="email" name="email" id="" required placeholder="Student Email..."
                value="<?php echo $final_data['email'] ?>">
            <div class="select-inputs">
                <select name="department" id="" required>
                    <option value="">Choose Department</option>
                    <option value="Computer" <?php if($final_data['department'] == "Computer") echo 'selected' ?>>Computer</option>
                    <option value="Electical" <?php if($final_data['department'] == "Electical") echo 'selected' ?>>Electical</option>
                    <option value="Civil" <?php if($final_data['department'] == "Civil") echo 'selected' ?>>Civil</option>
                    <option value="Mechanical" <?php if($final_data['department'] == "Mechanical") echo 'selected' ?>>Mechanical</option>
                    <option value="Automobile" <?php if($final_data['department'] == "Automobile") echo 'selected' ?>>Automobile</option>
                    <option value="Textile" <?php if($final_data['department'] == "Textile") echo 'selected' ?>>Textile</option>
                </select>
                <select name="semester" id="" required>
                    <option value="">Choose Semester</option>
                    <option value="1st" <?php if($final_data['semester'] == "1st") echo 'selected' ?>>1st</option>
                    <option value="2nd" <?php if($final_data['semester'] == "2nd") echo 'selected' ?>>2nd</option>
                    <option value="3rd" <?php if($final_data['semester'] == "3rd") echo 'selected' ?>>3rd</option>
                    <option value="4th" <?php if($final_data['semester'] == "4th") echo 'selected' ?>>4th</option>
                    <option value="5th" <?php if($final_data['semester'] == "5th") echo 'selected' ?>>5th</option>
                    <option value="6th" <?php if($final_data['semester'] == "6th") echo 'selected' ?>>6th</option>
                    <option value="7th" <?php if($final_data['semester'] == "7th") echo 'selected' ?>>7th</option>
                    <option value="8th" <?php if($final_data['semester'] == "8th") echo 'selected' ?>>8th</option>
                </select>
            </div>
            <button class="update-btn" type="submit" name="update-btn">Update</button>
        </form>
    </div>
</body>

</html>

<?php 
    if(isset($_POST['update-btn'])) {
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $registration = $_POST['registration'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $semester = $_POST['semester'];

        $update_query = "UPDATE `details` SET `name`='$name',`roll`='$roll',`registration`='$registration',`email`='$email',`department`='$department',`semester`='$semester' WHERE `id` = $get_id";
        $exe_update = mysqli_query($connection,$update_query);

        if($exe_update) {
            ?>
                <script>
                    alert("Updated Successfully");
                    location.replace("show.php");
                </script>
            <?php
        }

    }
?>