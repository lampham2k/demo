<?php

switch($action){
    case '':
        require 'model/student.php'; 
        $student = student_index(); 
        require 'view/student/index.php';
        break;
    case 'create':
        require 'model/class.php';
        $class = class_index(); 
        require 'view/student/create.php';
        break;
    case 'store':
        $name = $_POST['name'];
        $class_id = $_POST['class_id'];
        require 'model/student.php';
        student_store($name,$class_id);
        header('location:index.php?controller=student');
        // header('location:index.php');
        break;
    case 'edit':
        $id = $_GET['id'];
        require 'model/student.php';
        $each = student_edit($id);
        require 'model/class.php';
        $class = class_index(); 
        require 'view/student/update.php';
        break;
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $class_id = $_POST['class_id'];
        require 'model/student.php';
        student_update($id,$name,$class_id);
        header('location:index.php?controller=student');
        break;
    case 'remove':
        $id = $_GET['id'];
        require 'model/student.php';
        student_delete($id);
        header('location:index.php?controller=student');
        break;
    default:
        echo 'error';
}
