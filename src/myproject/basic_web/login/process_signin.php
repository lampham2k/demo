<?php
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
} else {
    $remember = false;
}

include '../admin/connect.php';
$sql ="select * from customers where email = '$email' and password = '$password' " ;
// đoạn trên sẽ đếm tất cả các dòng xem có cái nào có trùng email và mk không.
$result = mysqli_query($connect,$sql);
// $number_rows = mysqli_fetch_array($result)['count(*)'];
$number_rows = mysqli_num_rows($result);
// đếm số dòng từ biến result 
if($number_rows == 1){
    session_start();
    $each = mysqli_fetch_array($result);
    // $_SESSION['id'] = $each['id'];
    $_SESSION['id'] = $each['id'];
    $each['id'] = $id;
    $_SESSION['name'] = $each['name'];
    if($remember == true){
        $token = uniqid('user_',true);
        // uniqid là hàm tạo ra string ngẫu nhiên với user là tên mình đặt còn true là luôn tạo ra mã.
        $sql = "update customers
        set
        token = '$token' 
        where id = '$id'";
        mysqli_query($connect,$sql);
         // set token là biến token mới tạo với điều kiện id là session id trên máy client .
        setcookie('remember' , $token ,time() + 60*60*24*30);
    }
    header('location:../user.php?success=sign in success');
    exit;
} 
    header('location:index.php?error=sign in fail');