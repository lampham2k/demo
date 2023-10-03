<?php
require '../../check_super_admin.php';

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'] )){
    header('location:form_insert.php?error=must fill out all information');
} else {
    $name = addslashes($_POST['name']);
    $address = addslashes($_POST['address']);
    $phone = addslashes($_POST['phone']);
    $image = addslashes($_POST['image']);

    include '../connect.php';

    $sql = "insert into nha_san_xuat(ten,dia_chi,sdt,anh)
    values('$name','$address','$phone','$image')";

    mysqli_query($connect , $sql);
    mysqli_close($connect);

    header('location:index.php?success=more success');
}



$errors = mysqli_error($connect);
echo $errors;
