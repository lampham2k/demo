<?php
require '../../check_admin_login.php';// kiểm tra nếu không có level thì sẽ điều hương về login 
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
    This is the statistics page for admin
    <ul>
        <li><a href="Statistics_by_timeline.php">Statistics_by_timeline</a></li>
        <li><a href="best_selling.php.php">best_selling products and sluggish products</a></li>
        <li><a href="revenue_by_timeline.php">revenue_by_timeline</a></li>
        <li><a href="number_of_member.php">number_of_member</a></li>
        <li><a href="potential_customers.php">potential_customers</a></li>
        <li><a href="products_by_brand.php">products_by_brand</a></li>
    </ul>
</body>
</html>