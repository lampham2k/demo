<?php
try{ 
session_start();
// unset($_SESSION['carts']);
if(empty($_GET['id'])){
    throw new Exception("không tồn tại id");    
}
$id = $_GET['id'];
if(empty($_SESSION['carts'][$id])){
    // khi chưa có sản phẩm trong giỏ hàng thí sẽ kết nối tới db 
    require 'admin/connect.php';
    $sql = " select * from products
    where id = '$id'
    ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    $_SESSION['carts'][$id]['name'] = $each['name'];
    $_SESSION['carts'][$id]['quantity'] = 1;
    $_SESSION['carts'][$id]['photo'] = $each['photo'];
    $_SESSION['carts'][$id]['price'] = $each['price'];
} else {
    $_SESSION['carts'][$id]['quantity']++;
}
echo 1;
} catch (throwable $e) {
    echo $e;
}
// header('location:view_cart_v1.php?success=update success');
// echo json_encode($_SESSION['carts']);
// echo $_SESSION['carts'];
// $_SESSION['carts'] bây giờ là mảng , nên k dùng echo in ra được phải dùng print_r
// print_r($_SESSION['carts']);

// hoạt động theo cách nếu khách hàng thêm hàng vào giỏ thì sẽ lấy thông tin từ database
// gắn vào id luôn , lần sau khách hàng thêm tiếp hàng thì chỉ thay đổi số lượng.
// và load lại trang xem giỏ hàng k cần lấy thông tin từ data nữa mà chỉ in ra những gì đã lưu ở đây