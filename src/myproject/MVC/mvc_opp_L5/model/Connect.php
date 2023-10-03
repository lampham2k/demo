<?php

class Connect {
    private $host = 'host.docker.internal:33061';
    private $user = 'root';
    private $password = 'root';
    private $database = 'project_2_J2school';

    private function cnt(){
        $connect = mysqli_connect($this->host,$this->user,$this->password,$this->database);

        return $connect;
    }

    public function result_sql($sql){
        $connect = (new Connect())->cnt();

        $result = mysqli_query($connect,$sql);

        return $result;
    }

    public function sql($sql){
        $connect = (new Connect())->cnt();

        mysqli_query($connect,$sql);
    }
}