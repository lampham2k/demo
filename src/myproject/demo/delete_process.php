<?php
require_once 'employee.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $id = $_GET['id'];

    $employee = new Employee($id, null, null, null, null);

    if(!$employee->find()) {

        header('Location: list.php?error=Employee not found.');
        exit;

    }
    
    if(!$employee->delete()) {

        header('Location: list.php?error=can not delete employee');

        exit;

    }

    header('Location: list.php?success=deleted success');

    exit;
}
?>