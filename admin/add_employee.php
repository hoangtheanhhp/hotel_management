<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
if (!isset($_SESSION['admin'])) header('location:index.php');
include('../controller/c_employee.php');
$admin = new C_employee;
$adminPage = $admin->create();

?>