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
    echo 'the same email';
    exit;
}

$sql = "insert into customers(name,email,password,phone_number,address)
values('$name','$email','$password','$phone_number','$address')";
mysqli_query($connect , $sql);


$sql ="select id from customers where email = '$email' " ;
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
// tạo session để lưu lại phiên đăng nhập.
mysqli_close($connect);
// header('location:index.php?success=Sign Up Success');        update: tạm thời bỏ header vì xử lí bên fronted 
echo 1;


