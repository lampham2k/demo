<?php

require_once 'model/Connect.php';
require 'model/StudentObject.php';

class Student_model {

    private string $table = 'student';

    public function all(){

        $sql = "select $this->table.*, class.name as 'class_name' 
        from $this->table
        join class on student.class_id = class.id";

        $result = (new Connect())->result_sql($sql);

        $arr = [];

        foreach($result as $row){
            $Object = new StudentObject($row);

            $arr[] = $Object;
        }

        return $arr;
    }

    public function create($params){

        $object = new StudentObject($params);

        $sql = "insert into $this->table(name,class_id)
        values('{$object->get_name()}','{$object->get_class_id()}')";

        (new Connect())->sql($sql);
    }

    public function edit($id) :object{

        $sql = "select * from $this->table where id = '$id' "; 

        $result = (new Connect())->result_sql($sql);

        $each = mysqli_fetch_array($result);

        return new StudentObject($each);
    }

    public function update($params){

        $object = new StudentObject($params);

        $sql = " update $this->table set
        name = '{$object->get_name()}', 
        type = '{$object->get_type()}' 
        where 
        id ='{$object->get_id()}' ";

        (new Connect())->sql($sql);
    }
}