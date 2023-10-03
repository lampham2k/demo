<?php
session_start();
//if(!isset($_SESSION['level']) || $_SESSION['level'] !== 1 ){
if(empty($_SESSION['level'])){ //  hàm empty kiểm tra trống , nếu giá trị là 0 thì vẫn là trống
    // hàm empty thay thế cho câu if ở trên.
    header('location:../index.php');
    exit;
}

// kiểm tra nếu không có level thì sẽ điều hương về login 