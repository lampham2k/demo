<?php
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
} else {
    $remember = false;
}

require '../connect.php';

$sql = "select * from customers where email = '$email' and password = '$password' ";

$result = mysqli_query($connect,$sql);

if(mysqli_num_rows($result) === 1){
    $each = mysqli_fetch_array($result);
    session_start();
    $_SESSION['id'] = $each['id'];
    $id = $each['id'];
    $_SESSION['name'] = $each['name'];
    if($remember === true){
        $token = uniqid('user_',true);
        $sql = "update customers set token = '$token' where id = '$id' ";
        mysqli_query($connect,$sql);
        setcookie('remember' , $token , time() + 60*60*24*30);
    }
    header('location:index.php?success=login success');
    exit;
}
header('location:index.php?error=wrong email or password');