<?php

class ClassController 
{
    public function index(){
        require 'model/Class.php';
        $arr = (new Class_Model())->all();
        require 'view/class/index.php';
    }

    public function create(){
        require 'view/class/create.php';
    }

    public function store(){
        $name = $_POST['name'];
        $type = $_POST['type'];
        require 'model/Class.php';
        (new Class_Model())->create($name,$type);
        header('location:index.php');
    }

    public function edit(){
        $id = $_GET['id'];
        require 'model/Class.php';
        $each = (new Class_Model())->find($id);
        require 'view/class/edit.php';
    }

    public function update(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        require 'model/Class.php';
        (new Class_Model())->update($id,$name,$type);
        header('location:index.php');
    }

    public function delete(){
        $id = $_GET['id'];
        require 'model/Class.php';
        (new Class_Model())->destroy($id);
        header('location:index.php');
    }
}