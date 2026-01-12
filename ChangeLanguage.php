<?php
include 'SessionAdmin.php';
require 'MyChangeLanguage.php';
$view = new MyChangeLanguage();
$view->showToast($view->getModelPage()['LoadMessage']);
include 'ChangeLanguage_view.php';