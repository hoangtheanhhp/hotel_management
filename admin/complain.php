<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_admin.php');
$admin = new C_admin;
$adminPage = $admin->getComplain();

?>