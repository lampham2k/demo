<?php
require_once 'employee.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $fullname = $_POST['fullname'];
    
    $email = $_POST['email'];

    $phone = $_POST['phone'];

    $introduce = $_POST['introduce'];
    
    $newEmployee = new Employee(null, $fullname, $email, $phone, $introduce);

    if(!$newEmployee->store()) {

        header('Location: index.php?error=can not create employee');

        exit;

    }

    header('Location: list.php?success=created success');

    exit;
}
?>