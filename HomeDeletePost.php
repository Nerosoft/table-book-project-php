<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyHome.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class HomeDeletePost extends ValidationId{
    function __construct(){
        parent::__construct(new MyHome(), 'Delete');
        if($this->isEmptyErrors()){
            $myData =  $this->getView()->getObj();
            foreach ($this->getView()->getModel2()['AllNamesLanguage'] as $key => $value) 
                if(count($myData[$key]['MyFlexTables']) === 1)
                    unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables']);
                else
                    unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables'][$_POST['id']]);
            if(isset($myData[$_POST['id']]))
                unset($myData[$_POST['id']]);
            $this->getView()->saveModel($myData);
        }
    }
}

$view2 = new HomeDeletePost();
$view = $view2->getView();
include 'home_view.php';
}else
    header('LOCATION:Home');