<?php
require_once 'employee.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];

    $employee = new Employee($id, null, null, null, null);

    if(!$employee->find()) {

        header('Location: update.php?error=Employee not found.');
        exit;

    }

    $fullname = $_POST['fullname'];

    $email = $_POST['email'];

    $phone = $_POST['phone'];
  
    $introduce = $_POST['introduce'];

    $employeeUpdate = new Employee($id, $fullname, $email, $phone, $introduce);

    if(!$employeeUpdate->update()) {

        header('Location: list.php?error=can not update employee');

        exit;

    }

    header('Location: list.php?success=updated success');

    exit;
}
?>
