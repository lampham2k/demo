<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/demo/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
    <h2>Update Employee</h2>
    <?php

    $id = $_GET['id'];
    
    $sql = "select * from employee
    where id = '$id'";

    $result = mysqli_query($connect , $sql);

    $employeeData = mysqli_fetch_array($result);
    
    if (count($employeeData)) { ?>

        <form action="update_process.php" method="post">

            <input type="hidden" name="id" value="<?php echo $employeeData['id']; ?>">

            Full Name: <input type="text" name="fullname" value="<?php echo $employeeData['fullname']; ?>" required><br>

            Email: <input type="email" name="email" value="<?php echo $employeeData['email']; ?>" required><br>

            Phone: <input type="phone" name="phone" value="<?php echo $employeeData['phone']; ?>" required><br>
            
            Introduce: <textarea name="introduce" required rows="4" cols="5"><?php echo $employeeData['introduce']; ?></textarea><br>

            <input type="submit" value="Update Employee">
        </form>
        <?php
    } else {

        echo "Employee not found.";

    }
    ?>
</body>
</html>
