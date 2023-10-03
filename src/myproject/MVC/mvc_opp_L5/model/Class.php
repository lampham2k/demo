<?php

require_once 'model/Connect.php';
require 'model/ClassObject.php';

class class_model {
    public function all(){

        // $connect = mysqli_connect('host.docker.internal:33061','root','root','project_2_J2school');
        
        $sql = "select * from class";

        $result = (new Connect())->result_sql($sql);
        // $result = mysqli_query($connect,$sql);

        $arr = [];

        foreach($result as $row){
            $Object = new ClassObject($row);

            $arr[] = $Object;
        }

        return $arr;
    }

    public function create($params){

        $object = new ClassObject($params);

        $sql = "insert into class(name,type)
        values('{$object->get_name()}','{$object->get_type()}')";

        (new Connect())->sql($sql);
    }

    public function edit($id) :object{

        $sql = "select * from class where id = '$id' ";

        $result = (new Connect())->result_sql($sql);

        $each = mysqli_fetch_array($result);

        return new ClassObject($each);
    }

    public function update($params){

        $object = new ClassObject($params);

        $sql = " update class set
        name = '{$object->get_name()}', 
        type = '{$object->get_type()}' 
        where 
        id ='{$object->get_id()}' ";

        (new Connect())->sql($sql);
    }
}