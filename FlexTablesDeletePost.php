<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
class FlexTablesDeletePost extends ValidationId{
    function __construct(){
        parent::__construct($_GET['id']);
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            if(count($myData[$_GET['id']]) === 1)
                unset($myData[$_GET['id']]);
            else
                unset($myData[$_GET['id']][$_POST['id']]);
            $this->saveModel($myData);
            $view = new MyFlexTablesView('Delete');
            include 'FlexTables_view.php';
        }else{
            $view = new MyFlexTablesView();
            $this->displayErrors();
            include 'FlexTables_view.php';
        }
    }
}
new FlexTablesDeletePost();
}else
    header('LOCATION:Home');