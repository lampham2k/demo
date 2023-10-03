<?php
    require 'check_super_admin.php';
    $address= addslashes($_POST['address']);
    $phone_number= addslashes($_POST['phone']);
    $id = addslashes($_POST['id']);
    $name = addslashes($_POST['name']);
    $photo_new = $_FILES['photo_new'];
    if($photo_new['size'] > 0){
        $folder  = 'photos/';
        $file_extension = explode('.', $photo_new['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name ;
        move_uploaded_file($photo_new["tmp_name"], $path_file);
    } else {
        $file_name = $_POST['photo_old'];
    }

    include '../../connect.php';
    
    $sql = "update manufacturer
    set
    name = '$name',
    photos = '$file_name',
    address = '$address',
    phone_number = '$phone_number'
    where
    id = '$id' ";

    mysqli_query($connect,$sql);
    // header('location:index.php?success=it work'); 
    // mysqli_close($connect);
    // $error = mysqli_error($connect);
    // if(empty($error)){
    //     exit;
    // } else {
    //     header("location:form_update.php?error=error");
    // }