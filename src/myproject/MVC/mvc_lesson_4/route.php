<?php

require 'controller/ClassController.php';

$action = $_GET['action'] ?? 'index';

switch($action){
    case('index'):
    case('create'):
    case('store'):
    case('edit'):
    case('update'):
    case('delete'):
        (new ClassController())->$action();
        break;
    default:
        echo 'wrong action';
        break;
}
