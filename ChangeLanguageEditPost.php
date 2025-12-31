<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyChangeLanguage.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class ChangeLanguageEditPost extends ValidationId{
    function __construct(){
        parent::__construct(new MyChangeLanguage(), 'MessageModelEdit');
        $this->validChangeLanguage();
        if($this->isEmptyErrors()){
            $newKey = $_POST['id'];
            $myData = $this->getView()->getObj();
            foreach ($this->getView()->getallNames() as $key=>$value)
                $myData[$key]['AllNamesLanguage'][$newKey] = $_POST['lang_name'];
            $this->getView()->saveModel($myData);
        }
    }
}

$view2 = new ChangeLanguageEditPost();
$view = $view2->getView();
include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');