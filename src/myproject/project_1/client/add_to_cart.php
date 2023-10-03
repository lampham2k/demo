<?php
try{ 
session_start();
if(empty($_GET['id'])){
    throw new Exception("không tồn tại id");    
}
$id = $_GET['id'];
require '../connect.php';
$sql = " select * from products
where id = '$id'
";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
if(empty($_SESSION['carts'][$id]) and empty($_SESSION['quantitys'][$id])){
    $_SESSION['carts'][$id]['name'] = $each['name'];
    $_SESSION['carts'][$id]['quantity'] = 1;
    $_SESSION['carts'][$id]['photo'] = $each['photo'];
    $_SESSION['carts'][$id]['price'] = $each['price'];
} elseif(empty($_SESSION['carts'][$id]) and !empty($_SESSION['quantitys'][$id])) {
    $_SESSION['carts'][$id]['quantity'] = $_SESSION['quantitys'][$id]['quantity'];
    $_SESSION['carts'][$id]['photo'] = $each['photo'];
    $_SESSION['carts'][$id]['price'] = $each['price'];
    $_SESSION['carts'][$id]['name'] = $each['name'];
} elseif(!empty($_SESSION['carts'][$id]) and !empty($_SESSION['quantitys'][$id])){
    $_SESSION['carts'][$id]['quantity'] += $_SESSION['quantitys'][$id]['quantity'];
}
 else {
    $_SESSION['carts'][$id]['quantity']++;
}
echo 1;
} catch (throwable $e) {
    echo $e;
}