<?php

Class StudentObject{
    private $id ;
    private $name ;
    private $class_id ;
    private $class_name ;

    // id
    public function get_id(){
        return $this->id;
    }
    public function set_id($var){
        $this->id = $var;
    }

    // name
    public function get_name(){
        return $this->name;
    }
    public function set_name($var){
        $this->name = $var;
    }

    // class_id
    public function get_class_id(){
        return $this->class_id;
    }
    public function set_class_id($var){
        $this->class_id = $var;
    }

        // class_name
    public function get_class_name(){
        return $this->class_name;
    } 

    public function __construct($row){
        $this->id = $row['id'] ?? '';
        $this->name = $row['name'] ?? '';
        $this->class_id = $row['class_id'] ?? '';
        $this->class_name = $row['class_name'] ?? '';
    }
}