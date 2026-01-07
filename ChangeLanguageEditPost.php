<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyChangeLanguage.php';
require 'ValidationId.php';
class ChangeLanguageEditPost extends ValidationId{
    use ErrorChangelanguage;
    function __construct(){
        parent::__construct('ChangeLanguage', 'MessageModelEdit');
        $this->initErrorChangelanguage($this->getModel2());
        $this->validChangeLanguage($this);
        if($this->isEmptyErrors()){
            $newKey = $_POST['id'];
            $myData = $this->getObj();
            $this->saveLanguageDatabase($newKey, $myData, $this);
            $this->saveModel($myData);
        }
    }
}

$view2 = new ChangeLanguageEditPost();
$view = new MyChangeLanguage();
include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');