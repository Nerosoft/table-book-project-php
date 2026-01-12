<?php
require 'SessionAdmin.php';
require 'MyFlexTablesView.php';
$view = new MyFlexTablesView();
$view->showToast($view->getModelPage()['LoadMessage']);
include 'FlexTables_view.php';