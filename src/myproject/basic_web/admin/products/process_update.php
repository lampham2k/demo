<?php
    require '../../check_admin_login.php';// kiểm tra nếu không có level thì sẽ điều hương về login 

    $id = $_POST['id'];
    $name = $_POST['name'];
    $photo_new = $_FILES['photo_new'];
    if($photo_new['size'] > 0){
        $folder  = 'photos/';
        $file_extension = explode('.', $photo_new['name'])[1];
    // hàm explode sẽ cắt tên bởi một kí tự nào đó , xong suất ra thành mảng.
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name ;
    // $path_file = photos/time nối với định dạng file.

    // die($path_file);
        move_uploaded_file($photo_new["tmp_name"], $path_file);
    } else {
        $file_name = $_POST['photo_old'];
    }
    $price = $_POST['price'];
    $description = $_POST['description'];
    $manufacturer_id = $_POST['manufacturer_id'];

    // print_r($photo);
    // die(); 2 dòng code trên cho ra detail photo

    include '../connect.php';

    $sql = "update products 
    set
    name = '$name',
    photo = '$file_name',
    price = '$price',
    description = '$description',
    manufacturer_id = '$manufacturer_id'
    where
    id = '$id'";

    mysqli_query($connect ,$sql);
    // mysqli_close($connect);
    // $error = mysqli_error($connect);
    // echo $error;