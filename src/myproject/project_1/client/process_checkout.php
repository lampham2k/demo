<?php 
session_start();
if(empty($_SESSION['carts'])){
    header('location:view_cart.php');    
}
$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];

$id = $_SESSION['id'];
require '../connect.php';

$cart = $_SESSION['carts'];

$total_price = 0;
foreach($cart as $each){
    $total_price += $each['quantity'] * $each['price'];
}
$customer_id = $_SESSION['id'];
$status = 0; // mới đặt 
$created_at = date('Y-m-d');

$sql =" insert into orders(customer_id,name_receiver,phone_receiver,address_receiver,status,created_at,total_price)
        values('$customer_id','$name_receiver','$phone_receiver','$address_receiver','$status','$created_at','$total_price')
";
mysqli_query($connect , $sql);

$order_id = mysqli_insert_id($connect);

foreach($cart as $product_id => $each){
    $quantity = $each['quantity'];
    $sql = "insert into order_product(order_id,product_id,quantity)
    values('$order_id','$product_id','$quantity')";
    mysqli_query($connect , $sql);
}
mysqli_close($connect);
unset($_SESSION['carts']);
// $ca = $_SESSION['carts'];
// echo json_encode($ca);
header('location:index.php?success');
