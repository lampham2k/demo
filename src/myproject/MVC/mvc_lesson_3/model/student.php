<?php

require_once 'model/connect.php';

$connect = connect();

function student_index(){
    $connect = connect();
    $sql = "select * from student";
    $result = mysqli_query($connect,$sql);
    return $result;
    mysqli_close($connect);
}

function student_store($name,$class_id){
    $connect = connect();
    $sql = "insert into student(name,class_id)
    values('$name','$class_id')";
    mysqli_query($connect,$sql);
}

function student_edit($id){
    global $connect;
    $sql = "select * from student where id = '$id' ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    return $each;
}

function student_update($id,$name,$class_id){
    global $connect;
    $sql = "update student set name = '$name', class_id = '$class_id' where id = '$id' ";
    mysqli_query($connect,$sql);
}

function student_delete($id){
    global $connect;
    $sql = "delete from student where id = '$id' ";
    mysqli_query($connect,$sql);
}