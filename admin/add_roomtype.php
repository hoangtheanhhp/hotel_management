<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_roomtype.php');
$room = new C_roomtype;
$roomPage = $room->create();

?>