<?php

require 'controller/Controller.php';
require 'controller/ClassController.php';
require 'controller/StudentController.php';

$action = $_GET['action'] ?? 'index';

$controller = $_GET['controller'] ?? 'base';

switch($controller){
    case 'base':
        (new Controller())->menu();
        break;
    case 'class':
        switch($action){
            case 'index':
                (new Class_Controller())->index();
                break;
            case 'create':
                (new Class_Controller())->create();
                break;
            case 'store':
                (new Class_Controller())->store();
                break;
            case 'edit':
                (new Class_Controller())->edit();
                break;
            case 'update':
                (new Class_Controller())->update();
                break;
            case 'delete':
                (new Class_Controller())->store();
                break;
            default:
                echo 'error';      
        }
        break;
    case 'student':
        switch($action){
            case 'index':
                (new Student_Controller())->index();
                break;
            case 'create':
                (new Student_Controller())->create();
                break;
            case 'store':
                (new Student_Controller())->store();
                break;
            case 'edit':
                (new Student_Controller())->edit();
                break;
            case 'update':
                (new Student_Controller())->update();
                break;
            case 'delete':
                (new Student_Controller())->store();
                break;
            default:
                echo 'error';      
        }
        break; 
    default:
        echo 'errorr';
        break;
}