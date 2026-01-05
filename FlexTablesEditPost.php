<?php
include 'SessionAdmin.php';
require 'MyFlexTablesView.php';
require 'ValidationId.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId']) && isset($_SESSION['staticId']) && isset((new ModelJson($_GET['id']))->getObj()[(new ModelJson($_GET['id']))->getObj()['Setting']['Language']][$_GET['id']])){
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