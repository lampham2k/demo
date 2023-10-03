<?php
require '../../check_super_admin.php';// kiểm tra nếu không có level thì sẽ điều hương về login 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <form action="process_insert.php" method="post">
        name
        <input type="text" name="name">
        <br>
        address
        <textarea name="address" id="" cols="30" rows="10"></textarea>
        <br>
        phone
        <input type="text" name="phone">
        <br>
        image
        <input type="text" name="image">
        <button>send</button>
    </form>
</body>
</html>