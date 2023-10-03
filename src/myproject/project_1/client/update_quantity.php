<?php
session_start();
$id = $_GET['id'];
$type = $_GET['type'];
if($type === '0'){
    if($_SESSION['carts'][$id]['quantity'] > 1){
        $_SESSION['carts'][$id]['quantity']--;
    } else {
        unset($_SESSION['carts'][$id]);
    }
} else {
        $_SESSION['carts'][$id]['quantity']++;
}
