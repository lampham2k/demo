<?php

class Student_Controller {
    public function index(){
        require 'model/Student.php';
        $arr = (new Student_model())->all();
        require 'view/Student/index.php';
    }
    
    public function create(){
        require 'model/Class.php';
        $arr = (new Class_model())->all();
        require 'view/Student/create.php';
    }

    public function store(){
        require 'model/Student.php';
        (new Student_model())->create($_POST);
    }

    public function edit(){
        $id = $_GET['id'];
        require 'model/Student.php';
        $each = (new Student_model())->edit($id);
        require 'model/Class.php';
        $arr = (new Class_model())->all();
        require 'view/Student/edit.php';
    }

    public function update(){
        require 'model/Student.php';
        (new Student_model())->update($_POST);
    }
}