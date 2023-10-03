<?php
session_start();
if(empty($_SESSION['id'])){
    header('location:index.php?error=please log in');       
}
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
This is the user page, hello
<?php
echo $_SESSION['name'] ;
 ?>
 <a href="signout.php">
     sign out
 </a>
</body>
</html>