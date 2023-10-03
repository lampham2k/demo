<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require '../connect.php';
$sql ="select count(*) from customers where email = '$email' and password = '$password' ";
$result = mysqli_query($connect,$sql);
$check = mysqli_fetch_array($result)['count(*)'];

if($check == 1){
    header('location:signup.php?error=the same email');
    exit;
}

$sql =  "insert into customers(name,email,password,address,phone) 
        values('$name','$email','$password','$address','$phone')";
mysqli_query($connect , $sql);

$id = mysqli_insert_id($connect);
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

header('location:index.php?success=success');






