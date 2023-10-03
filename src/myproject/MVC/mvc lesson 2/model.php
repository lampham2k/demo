<?php

$connect = mysqli_connect('host.docker.internal:33061','root','root','project_2_J2school');

switch($action){
    case '':
        $sql = "select * from sinh_vien";
        $result = mysqli_query($connect, $sql);
        break;
    case 'store':
        $sql = "insert into sinh_vien(name)
        values('$name')";
        mysqli_query($connect,$sql);
        break;
    case 'edit':
        $sql = "select * from sinh_vien where id = '$id' ";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        break;
    case 'update':
        $sql = "update sinh_vien set name = '$name' where id = '$id' ";
        mysqli_query($connect, $sql);
        break;
    case 'delete':
        $sql = "delete from sinh_vien where id = '$id' ";
        mysqli_query($connect, $sql);
        break;
    }