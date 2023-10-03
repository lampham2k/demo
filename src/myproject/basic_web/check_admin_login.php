<?php
session_start();

if(!isset($_SESSION['level'])){
    header('location:../index.php');
    exit;
}

// kiểm tra nếu không có level thì sẽ điều hương về login 