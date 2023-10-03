<?php
session_start();
$id = $_GET['id'];
$type = $_GET['type'];
if($type === 0){
    if($_SESSION['carts'][$id]['quantity'] > 1){
        $_SESSION['carts'][$id]['quantity']--;
        // nếu giỏ hàng tại ví trí id có số lượng bằng 1 thì sẽ xóa nó đi , cụ thể là xóa phiên của nó
        // còn else thì giảm 1
    } else {
        unset($_SESSION['carts'][$id]);
    }
} else {
        $_SESSION['carts'][$id]['quantity']++;
}

// header('location:view_cart_v1.php?success=update success');
