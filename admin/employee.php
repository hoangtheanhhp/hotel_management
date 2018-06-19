<?php

include('../controller/c_admin.php');
$admin = new C_admin;
$adminPage = $admin->getEmployee();

?>