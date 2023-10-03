<?php

Class ClassObject{
    private $id ;
    private $name ;
    private $type ;

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

    // type
    public function get_type(){
        return $this->type;
    }
    public function set_type($var){
        $this->type = $var;
    }

    public function __construct($row){
        $this->id = $row['id'] ?? '';
        $this->name = $row['name'] ?? '';
        $this->type = $row['type'] ?? '';
    }
}