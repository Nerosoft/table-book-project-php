<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->initErrorChangelanguage($this->getModel2());
        $this->validChangeLanguage($this);
        if($this->isEmptyErrors()){
            $newKey = $_POST['id'];
            $myData = $this->getObj();
            $this->saveLanguageDatabase($newKey, $myData, $this);
            $this->saveModel($myData);
            $view = new MyChangeLanguage('MessageModelEdit');
            include 'ChangeLanguage_view.php';
        }else{
            $view = new MyChangeLanguage();
            $this->displayErrors();
            include 'ChangeLanguage_view.php';
        }
    }
}

new ChangeLanguageEditPost();
}else
    header('LOCATION:ChangeLanguage');