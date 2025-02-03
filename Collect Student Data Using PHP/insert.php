<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
        .btns {
            width: 63%;
            display: flex;
            justify-content: space-between;
        }
        .btns button{
            padding: 10px 45px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            font-weight: bold;
            color: white;
        }
        .submit-btn {
            background: linear-gradient(90deg,cyan,purple);
            border: none;
        }
        .reset-btn {
            background: linear-gradient(90deg,red,purple);
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
            .btns {
            width: 103%;
            flex-direction: column;
            gap: 10px;
        }
            
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student <span style="color: purple">Information</span></h1>
        <form action="" method="POST">
            <input type="text" name="name" id="" required placeholder="Student Name...">
            <input type="number" name="roll" id="" required placeholder="Student Roll...">
            <input type="number" name="registration" id="" required placeholder="Student Registration...">
            <input type="email" name="email" id="" required placeholder="Student Email...">
            <div class="select-inputs">
                <select name="department" id="" required>
                    <option value="">Choose Department</option>
                    <option value="Computer">Computer</option>
                    <option value="Electical">Electical</option>
                    <option value="Civil">Civil</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Automobile">Automobile</option>
                    <option value="Textile">Textile</option>
                </select>
                <select name="semester" id="" required>
                    <option value="">Choose Semester</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                    <option value="7th">7th</option>
                    <option value="8th">8th</option>
                </select>
            </div>
            <div class="btns">
                <button class="submit-btn" type="submit" name="submit-btn">Submit</button>
                <button class="reset-btn" type="reset">Reset</button>
            </div>
            <a href="show.php" target="_blank">See details here</a>
        </form>
    </div>
</body>
</html>

<?php 
    include "connection.php";

    if(isset($_POST["submit-btn"])){
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $registration = $_POST["registration"];
        $email = $_POST["email"];
        $department = $_POST["department"];
        $semester = $_POST["semester"];

        $insert_query = "INSERT INTO `details`(`name`, `roll`, `registration`, `email`, `department`, `semester`) VALUES ('$name','$roll','$registration','$email','$department','$semester')";

        $exe_insert = mysqli_query($connection, $insert_query);
    }

?>