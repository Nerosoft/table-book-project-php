<?php
include 'SessionAdmin.php';
require 'MyHome.php';
$view = new MyHome();
$view->showToast($view->getModelPage()['LoadMessage']);
include 'home_view.php';