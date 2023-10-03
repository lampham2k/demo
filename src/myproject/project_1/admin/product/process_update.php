<?php
require 'check_admin.php';
$id = $_POST['id'];
$price = $_POST['price'];
$description = $_POST['description'];
$name = $_POST['name'];
$manufacturer_id = $_POST['manufacturer_id'];
$photo_new = $_FILES['photo_new'];

if($photo_new['size'] > 0){
    $folder = 'photos/';
    $file_extention = explode('.', $photo_new['name'][1]);
    $file_name = time() . '.' . $file_extention;
    $path_file = $folder . $file_name ;
    move_uploaded_file($photo_new["tmp_name"], $path_file);

} else {
    $file_name = $_POST['photo_old'];
}

require '../../connect.php';

$sql = "update products 
set 
name = '$name', 
price = '$price', 
description = '$description', 
manufacturer_id = '$manufacturer_id', 
photo = '$file_name'
where id = '$id' 
";
// die($sql);
mysqli_query($connect,$sql);