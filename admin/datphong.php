<?php
@session_start();
if (!isset($_SESSION['login'])) header('location:../dangnhap.php');
include('../controller/c_room.php');
$admin = new C_room;
if ( isset($_GET['room_id']) && isset($_GET['room_type_id'])) {
    $adminPage = $admin->getDatPhong($_GET);
}

?>