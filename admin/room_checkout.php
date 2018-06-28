<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_room.php');
$room = new C_room;
$roomPage = $room->checkOut($_GET['room_id']);

?>