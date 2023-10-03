<?php

$action = $_GET['action'] ?? ''; 
$controller = $_GET['controller'] ?? ''; 

switch ($controller){
    case '':
        require 'controller/controller.php';
        break;
    case 'class':
        require 'controller/class_controller.php';
        break;
    case 'student':
        require 'controller/student_controller.php';
        break;
    default:
        echo 'error';
}
