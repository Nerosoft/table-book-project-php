<?php
include 'SessionAdmin.php';
require 'MyChangeLanguage.php';
require 'ValidationId.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct('ChangeLanguage', 'ChangeLang');
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            $myData['Setting']['Language'] = $_POST['id'];
            $this->saveModel($myData);
        }
    }
}
$view2 = new ChangeLanguagePost();
$view = new MyChangeLanguage();
include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');