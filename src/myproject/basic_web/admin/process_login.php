<?php
$email = $_POST['email'];
$password = $_POST['password'];

require 'connect.php';

$sql = "select * from admin where email = '$email' and password = '$password' ";

$result = mysqli_query($connect,$sql);

if(mysqli_num_rows($result) === 1){
    $each = mysqli_fetch_array($result);
    session_start();
    $_SESSION['id'] = $each['id'];
    $_SESSION['name'] = $each['name'];
    $_SESSION['level'] = $each['level'];
    header('location:root/index.php?success=login success');
    exit;
}

header('location:index.php?error=wrong email or password');
// nếu trả về 1 kết quả thì mới lấy dữ liệu và lưu vào trong session
// nếu không trả về kq thì sẽ điều hướng về login và báo sai email hoặc mk

// phải luôn kiểm tra ở các file của admin là người dùng đã đăng nhập hay chưa 
