<?php

switch($action){
    case '':
        require 'model/class.php';
        $result = class_index();
        require 'view/class/index.php';
        break;
    case 'create':
        require 'view/class/create.php';
        break;
    case 'store':
        $name = $_POST['name'];
        require 'model/class.php';
        class_store($name);
        // header('location:index.php');
        break;
    case 'edit':
        $id = $_GET['id'];
        require 'model/class.php';
        $each = class_edit($id);
        require 'view/class/update.php';
        break;
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        require 'model/class.php';
        class_update($id,$name);
        break;
    case 'remove':
        $id = $_GET['id'];
        require 'model/class.php';
        class_delete($id);
        header('location:index.php?controller=class');
        break;
    default:
        echo 'error';
}
