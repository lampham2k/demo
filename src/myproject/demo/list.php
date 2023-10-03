<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/demo/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Employees</title>
</head>
<body>
    <h2>List of Employees</h2>
    <?php

    $sql = "select * from employee order by id desc limit 3";

    $employeeList = mysqli_query($connect , $sql);

    if ($employeeList) {

            echo "<ul>";

            foreach ($employeeList as $employee) {

                $id = $employee['id'];

                $fullname = $employee['fullname'];

                $email = $employee['email'];

                $phone = $employee['phone'];

                echo "<li> $fullname - $email - $phone (<a href='update.php?id=$id'>Update</a>) | 
                //  <a href='delete_process.php?id=$id'>Delete</a>)</li>";
                
            }

            echo "</ul>";

    } else {

        echo "No employees found.";

    }
    ?>
    <p><a href="index.php">Add New Employee</a></p>
</body>
</html>
