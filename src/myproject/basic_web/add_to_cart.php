<?php
session_start();
// unset($_SESSION['carts']);
$id = $_GET['id'];

if(empty($_SESSION['carts'])){
    $_SESSION['carts'][$id] = 1;
    // nếu chưa có hàng thì sẽ gán giỏ hàng tại vị trí id là 1
    // dòng trên là tạo mảng với key và value
} else {
    if(!empty($_SESSION['carts'][$id])){
        $_SESSION['carts'][$id]++;
        // nếu k trống giỏ hàng tại ví trí thứ id thì sẽ tăng thêm 1.
    } else {
        $_SESSION['carts'][$id] = 1;
    }
}
header('location:view_cart_v1.php?success=update success');
// echo $_SESSION['carts'];
// $_SESSION['carts'] bây giờ là mảng , nên k dùng echo in ra được phải dùng print_r
// print_r($_SESSION['carts']);