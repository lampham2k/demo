<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['carts']);


setcookie('remember' ,null,-1);

header('location:index.php?success=successfully logged out');