<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyFlexTablesView.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class FlexTablesDeletePost extends ValidationId{
    function __construct(){
        parent::__construct(new MyFlexTablesView(), 'Delete');
        if($this->isEmptyErrors()){
            $myData = $this->getView()->getObj();
            if(count($myData[$_GET['id']]) === 1)
                unset($myData[$_GET['id']]);
            else
                unset($myData[$_GET['id']][$_POST['id']]);
            $this->getView()->saveModel($myData);
        }
    }
}
$view2 = new FlexTablesDeletePost();
$view = $view2->getView();
include 'FlexTables_view.php';
}else
    header('LOCATION:Home');