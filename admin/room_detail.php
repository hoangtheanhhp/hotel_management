<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_room.php');
$room = new C_room;
$roomPage = $room->show($_GET['room_id']);

?>