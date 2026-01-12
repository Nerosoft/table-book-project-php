<?php
include 'SessionAdmin.php';
require 'MyBranch.php';
$view = new MyBranch();
$view->showToast($view->getModelPage()['LoadMessage']);
include 'Branch_view.php';