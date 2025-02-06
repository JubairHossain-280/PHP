<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: "Raleway", sans-serif;
        }
        h1 {
            text-align: center;
        }
        .table-container {
            overflow: auto;
        }
        table {
            border-collapse: collapse;
            margin: auto;
        }
        th , td {
            padding: 10px 25px;
        }
        .fa-pen-to-square {
            font-size: 22px;
            color: black;
            transition: all 0.2s ease;
        }
        .fa-pen-to-square:hover {
            color: green;
        }
        .fa-trash {
            font-size: 22px;
            color: black;
            transition: all 0.2s ease;
        }
        .fa-trash:hover {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Student <span style="color: purple">Details</span></h1>
    <div class="table-container">
        <table border="2">
            <thead>
                <th>Name</th>
                <th>Roll</th>
                <th>Registration No.</th>
                <th>Email</th>
                <th>Department</th>
                <th>Semester</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                <?php 
                    include "connection.php";
    
                    $select_query = "SELECT * FROM `details`";
                    $exe_select = mysqli_query($connection, $select_query);
                    while ($row = mysqli_fetch_array($exe_select)) {
                        ?>
    
                        <tr>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["roll"] ?></td>
                            <td><?php echo $row["registration"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["department"] ?></td>
                            <td><?php echo $row["semester"] ?></td>
                            <td><a href="update.php?v2=<?php echo  $row["id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="delete.php?v=<?php echo  $row["id"] ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
    
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>