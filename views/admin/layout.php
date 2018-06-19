<?php

ob_start();
session_start();
include_once "header.php";
include_once "sidebar.php";
include_once $view.".php";
include_once "footer.php";

?>