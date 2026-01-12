<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyFlexTablesView.php';
require 'ValidationId.php';
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
            $view = new MyFlexTablesView();
            $this->showToast($this->getToastMessage());
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