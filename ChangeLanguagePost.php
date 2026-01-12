<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguagePost extends ValidationId{
    function __construct(){
        parent::__construct('ChangeLanguage', 'ChangeLang');
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            $myData['Setting']['Language'] = $_POST['id'];
            $this->saveModel($myData);
            $view = new MyChangeLanguage();
            $this->showToast($this->getToastMessage());
            include 'ChangeLanguage_view.php';
        }else{
            $view = new MyChangeLanguage();
            $this->displayErrors();
            include 'ChangeLanguage_view.php';
        }
    }
}
new ChangeLanguagePost();
}else
    header('LOCATION:ChangeLanguage');