<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesEditPost extends ValidationId{
    use ErrorFlexTable;
    function __construct(){
        parent::__construct($_GET['id'], 'MessageModelEdit');
        $this->initErrorFlexTable($this->getModelPage());
        $this->validFlexTable();
        if($this->isEmptyErrors())
            $this->saveFlexDataBase($_POST['id']);
    }
}
$view2 = new FlexTablesEditPost();
$view = new MyFlexTablesView();
include 'FlexTables_view.php';
}else
    header('LOCATION:Home');