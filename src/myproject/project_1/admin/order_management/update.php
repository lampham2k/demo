<?php
$id = $_GET['id'];
$status = $_GET['status'];

require '../../connect.php';
if($status == 1){
    $sql = "update orders
    set
    status = '$status' where id = '$id' ";
    mysqli_query($connect , $sql);
} else {
    $sql = "update orders
    set
    status = '$status' where id = '$id' ";
    mysqli_query($connect , $sql);
}

header('location:index.php?success=success');