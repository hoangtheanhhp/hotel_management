<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_employee.php');
$admin = new C_employee;
if (isset($_GET['id'])) {
    $adminPage = $admin->show($_GET['id']);
} else {
    
}
?>