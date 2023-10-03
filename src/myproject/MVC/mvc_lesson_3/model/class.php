<?php

require_once 'model/connect.php';

$connect = connect();

function class_index(){
    $connect = connect();
    $sql = "select * from class";
    $result = mysqli_query($connect,$sql);
    return $result;
    mysqli_close($connect);
}

function class_store($name){
    $connect = connect();
    $sql = "insert into class(name)
    values('$name')";
    mysqli_query($connect,$sql);
}

function class_edit($id){
    global $connect;
    $sql = "select * from class where id = '$id' ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    return $each;
}

function class_update($id,$name){
    global $connect;
    $sql = "update class set name = '$name' where id = '$id' ";
    mysqli_query($connect,$sql);
}

function class_delete($id){
    global $connect;
    $sql = "delete from class where id = '$id' ";
    mysqli_query($connect,$sql);
}
// switch($action){
//     case '':
//         $sql = "select * from class";
//         $result = mysqli_query($connect,$sql);
//         break;
//     case 'store':
//         $sql = "insert into class(name)
//         values('$name')";
//         mysqli_query($connect,$sql);
//         break;
//     case 'edit':
//         $sql = "select * from class where id = '$id' ";
//         $result = mysqli_query($connect,$sql);
//         $each = mysqli_fetch_array($result);
//         break;
//     case 'update':
//         $sql = "update class set name = '$name' where id = '$id' ";
//         mysqli_query($connect,$sql);
//         break;
//     case 'remove':
//         $sql = "delete from class where id = '$id' ";
//         mysqli_query($connect,$sql);
//         break;
// }