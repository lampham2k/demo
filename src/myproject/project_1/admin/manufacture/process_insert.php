<?php
require 'check_super_admin.php';
if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_FILES['image'] )){
    header('location:form_insert.php?error=must fill out all information');
    exit;
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$image = $_FILES['image'];

$folder  = 'photos/';
$file_extension = explode('.', $image['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name ;

move_uploaded_file($image["tmp_name"], $path_file);

require '../../connect.php';

$sql = "insert into manufacturer(name,address,phone_number,photos)
values('$name','$address','$phone','$file_name')";
mysqli_query($connect , $sql);

header('location:index.php?success=success');
