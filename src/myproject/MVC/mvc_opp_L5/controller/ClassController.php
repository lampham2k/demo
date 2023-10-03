<?php

// bản thân là 1 đối tượng nên phải khởi tạo class

class Class_Controller {
    public function index(){
        require 'model/Class.php';
        $arr = (new class_model())->all();
        require 'view/class/index.php';
    }
    
    public function create(){
        require 'view/class/create.php';
    }

    public function store(){
        // $name = $_POST['name'];
        // $type = $_POST['type'];
        require 'model/Class.php';
        (new class_model())->create($_POST);
    }

    public function edit(){
        $id = $_GET['id'];
        require 'model/Class.php';
        $each = (new class_model())->edit($id);
        require 'view/class/edit.php';
    }

    public function update(){
        require 'model/Class.php';
        (new class_model())->update($_POST);
    }
}