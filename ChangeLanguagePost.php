<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyChangeLanguage.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct(new MyChangeLanguage(), 'ChangeLang');
        if($this->isEmptyErrors()){
            $myData = $this->getView()->getObj();
            $myData['Setting']['Language'] = $_POST['id'];
            $this->getView()->saveModel($myData);
            $this->getView()->setLanguage($_POST['id']);
        }
    }
}

$view2 = new ChangeLanguagePost();
$view = $view2->getView();

include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');