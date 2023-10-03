<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['carts'][$id]);
// header('location:view_cart_v1.php?success=update success');