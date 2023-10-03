<?php

require 'model/connect.php';

class Class_Model
{

    private int $id;
    private string $name;
    private string $type;

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

    public function get_type_name(){
        return $this->name . '-' . $this->type;
    }

    public function all()
    {
        $sql = "select * from class";
        $result = (new Connect())->select($sql);

        $arr = [];
    
        foreach($result as $row){
            $object = new self();
            $object->set_id($row['id']);
            $object->set_name($row['name']);
            $object->set_type($row['type']);

            $arr[] = $object;
        }
        // mysqli_close($connect);
        return $arr;  
    }

    public function create($name,$type){

        $object = new self();
        $object->set_name($name);
        $object->set_type($type);
        
        $sql = "insert into class(name,type)
        values('$object->name','$object->type')";
        (new Connect())->execute($sql);
    }

    public function find($id)
    {
        $sql = "select * from class where id = '$id' ";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_array($result); 
    
            $object = new self();
            $object->set_id($row['id']);
            $object->set_name($row['name']);
            $object->set_type($row['type']);

        return $object;  
    }

    public function update($id,$name,$type)
    {
        $object = new self();
        $object->set_id($id);
        $object->set_type($type);
        $object->set_name($name);

        $sql = "update class 
        set name = '$object->name', type = '$object->type' 
        where id = '$object->id' ";
        (new Connect())->execute($sql);
    }
    public function destroy($id)
    {
        $object = new self();
        $object->set_id($id);

        $sql = "delete from class where id = '$object->id' ";
        (new Connect())->execute($sql); 
    }
}