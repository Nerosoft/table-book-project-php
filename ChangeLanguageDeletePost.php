<?php
include 'SessionAdmin.php';
require 'MyChangeLanguage.php';
require 'ValidationId.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['staticId'])){
class ChangeLanguageDeletePost extends ValidationId{
    use ErrorChangelanguageAllNames;
    function __construct(){
        parent::__construct('ChangeLanguage', 'Delete');
        $this->initErrorChangelanguageAllNames($this->getModel2()['AllNamesLanguage']);
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            unset($myData[$_POST['id']]);
            foreach ($this->getallNames() as $key=>$value)
                if($key !== $_POST['id'])
                    unset($myData[$key]['AllNamesLanguage'][$_POST['id']]);
            $this->saveModel($myData);
        }
    }
}
$view2 = new ChangeLanguageDeletePost();
$view = new MyChangeLanguage();
include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');