<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyChangeLanguage.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class ChangeLanguageDeletePost extends ValidationId{
    function __construct(){
        parent::__construct(new MyChangeLanguage(), 'Delete');
        if($this->isEmptyErrors()){
            $myData = $this->getView()->getObj();
            unset($myData[$_POST['id']]);
            foreach ($this->getView()->getallNames() as $key=>$value)
                if($key !== $_POST['id'])
                    unset($myData[$key]['AllNamesLanguage'][$_POST['id']]);
            $this->getView()->saveModel($myData);
        }
    }
}

$view2 = new ChangeLanguageDeletePost();
$view = $view2->getView();

include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');