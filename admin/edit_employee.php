<?php

include('../controller/c_employee.php');
$admin = new C_employee;
if (isset($_GET['id'])) {
    $adminPage = $admin->edit($_GET['id']);
}
?>