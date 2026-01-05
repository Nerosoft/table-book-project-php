<?php
include 'SessionAdmin.php';
require 'MyFlexTablesView.php';
require 'ValidationId.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])&& isset($_SESSION['staticId']) && isset($_SESSION['staticId']) && isset((new ModelJson($_GET['id']))->getObj()[(new ModelJson($_GET['id']))->getObj()['Setting']['Language']][$_GET['id']])){
class FlexTablesDeletePost extends ValidationId{
    function __construct(){
        parent::__construct($_GET['id'], 'Delete');
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            if(count($myData[$_GET['id']]) === 1)
                unset($myData[$_GET['id']]);
            else
                unset($myData[$_GET['id']][$_POST['id']]);
            $this->saveModel($myData);
        }
    }
}
$view2 = new FlexTablesDeletePost();
$view = new MyFlexTablesView();
include 'FlexTables_view.php';
}else
    header('LOCATION:Home');