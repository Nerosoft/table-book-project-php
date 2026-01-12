<?php
include 'SessionAdmin.php';
require 'MySystemlang.php';
$view = new MySystemlang();
$view->showToast($view->getModelPage()['LoadMessage']);
include 'SystemLang_view.php';