<?php

include('../controller/c_room.php');
$room = new C_room;
$roomPage = $room->index();

?>