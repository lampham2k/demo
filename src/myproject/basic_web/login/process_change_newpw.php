<?php

$token = $_GET['token'];
$password = $_GET['password'];

require '../connect.php';
    $sql = " select customer_id from forgot_password where token = $token ";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result !== 1)){
        header('location:index.php?error=syntax error');
        exit;
    }
// tìm id khách hàng từ token , xong rồi kiểm tra nếu có thì sẽ chạy tiếp

$customer_id = mysqli_fetch_array($result)['customer_id'];

$sql = "update customers set password = '$password' where id = '$customer_id' ";
mysqli_query($connect,$sql);
// đổi mật khẩu cũ thành mk mới từ id lấy dc

$sql =" delete from forgot_password where token = '$token' ";
// xong rồi xóa khách hàng quên mật khẩu trong bảng khách hàng.

header('location:index.php?success=You have successfully changed your password, please login again');
?>
