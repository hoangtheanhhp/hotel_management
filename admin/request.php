<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_request.php');
$room = new C_request;
$roomPage = $room->index();

?>