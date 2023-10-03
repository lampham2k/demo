<?php
require '../../check_super_admin.php';
$ma = $_POST['ma'];
if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])){
    header("location:form_update.php?ma=$ma&error=phải điền đầy đủ thông tin");
    exit;
}

$name = addslashes($_POST['name']);
// hàm addslashes là chèn dấu \ trước các kí tự đặt biệt 
$address = addslashes($_POST['address']);
$phone = addslashes($_POST['phone']);
$image = addslashes($_POST['image']);

require '../connect.php';

$sql = "update nha_san_xuat
set
ten = '$name',
dia_chi = '$address',
sdt = '$phone',
anh = '$image'
where
ma = '$ma'";

mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if(empty($error)){
    header('location:index.php?success=it work'); 
} else {
    header("location:form_update.php?ma=$ma&error=lỗi truy vấn");
}

