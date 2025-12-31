<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyHome.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class HomeEditPost extends ValidationId{
    function __construct(){
        parent::__construct(new MyHome(), 'MessageModelEdit');
        $this->validCustomTable();
        if($this->isEmptyErrors()){
            $myData = $this->getView()->getObj();
            foreach ($this->getView()->getModel2()['AllNamesLanguage'] as $code => $value) 
                $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
            $this->getView()->saveModel($myData);
        }
    }
}

$view2 = new HomeEditPost();
$view = $view2->getView();
include 'home_view.php';
}else
    header('LOCATION:Home');