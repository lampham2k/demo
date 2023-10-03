<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

include 'admin/connect.php';
$sql ="select count(*) from customers where email = '$email' " ;

$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
    session_start();
    $_SESSION['error'] = 'the same email';
    header('location:sign_up.php?');
    exit;
}

$sql = "insert into customers(name,email,password,phone_number,address)
values('$name','$email','$password','$phone_number','$address')";
mysqli_query($connect , $sql);
require 'mail.php'; // sau khi insert xong thì reuquire để chuyền biến vào hàm
$title = "sign up success";
$content = "Welcome to our website";
sendmail($email , $name , $title , $content);// chuyền biến vào hàm.

$sql ="select id from customers where email = '$email' " ;
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
// tạo session để lưu lại phiên đăng nhập.


mysqli_close($connect);

header('location:index.php?success=Sign Up Success');

$error = mysqli_error($connect);
echo $error;


