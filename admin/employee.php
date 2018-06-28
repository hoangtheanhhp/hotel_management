<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_employee.php');
$admin = new C_employee;
$adminPage = $admin->index();

?>