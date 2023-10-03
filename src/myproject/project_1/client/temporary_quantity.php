<?php
session_start();
if(empty($_GET['id'])){
    header('location:index.php');
}
$id = $_GET['id'];
$type = $_GET['type'];
require '../connect.php';
$sql = " select * from products
where id = '$id'
";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
if(empty($_SESSION['quantitys'][$id]) and $type === '1'){
    $_SESSION['quantitys'][$id]['name'] = $each['name'];
    $_SESSION['quantitys'][$id]['quantity'] = 2;
} else {
    if($type === '0' and $_SESSION['quantitys'][$id]['quantity'] > 1 ){
        $_SESSION['quantitys'][$id]['quantity']--; 
    } elseif($_SESSION['quantitys'][$id]['quantity'] <= 1 and $type === '0') {
        unset($_SESSION['quantitys'][$id]['quantity']);
    } else {
        $_SESSION['quantitys'][$id]['quantity']++;        
    }
}

// $quan = $_SESSION['quantitys'];
// echo json_encode($quan);