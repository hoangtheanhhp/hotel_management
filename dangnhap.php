<?php
@session_start();
if (isset($_SESSION['login'])) header('location:admin/index.php');
include('controller/c_user.php');
$home = new C_user;
$home->getDangnhap();
?>