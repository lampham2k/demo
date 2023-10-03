<?php

include($_SERVER['DOCUMENT_ROOT'] . '/demo/connect.php');

class Employee {

    public $id;

    public $fullname;

    public $email;
    
    public $phone;

    public $introduce;

    public $connection;

    public function __construct($id, $fullname, $email, $phone, $introduce) {

        $this->id = $id;

        $this->fullname = $fullname;

        $this->email = $email;

        $this->phone = $phone;

        $this->introduce = $introduce;

        $this->connection = $GLOBALS['connect'];
        
    }

    public function find()
    {
        $sql = "select * from employee where id = '$this->id'";
        
        $result = mysqli_query($this->connection, $sql);

        $employeeData = mysqli_fetch_array($result);

        if(!$employeeData) return false;

        return true;

    }
    
    public function store()
    {
        $sql = "insert into employee(fullname, email, phone, introduce) 
        values('$this->fullname', '$this->email', '$this->phone', '$this->introduce')";
        
        if(!mysqli_query($this->connection, $sql)) return false;

        mysqli_close($this->connection);

        return true;

    }
    
    public function update()
    {
        $sql = "update employee 
        set 
        fullname = '$this->fullname', 
        email = '$this->email',
        phone = '$this->phone', 
        introduce = '$this->introduce'
        where 
        id = '$this->id'";
        
        if(!mysqli_query($this->connection, $sql)) return false;

        mysqli_close($this->connection);

        return true;

    }

    public function delete()
    {

        $sql = "delete from employee 
        where 
        id = '$this->id'";
        
        if(!mysqli_query($this->connection, $sql)) return false;

        mysqli_close($this->connection);

        return true;

    }
}