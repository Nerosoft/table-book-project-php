<?php
include 'SessionAdmin.php';
// echo $_SESSION['userId'] . ' '. $_SESSION['staticId'];
// exit;
require 'MyHome.php';
$view = new MyHome();
include 'home_view.php';