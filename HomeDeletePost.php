<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyHome.php';
require 'ValidationId.php';
class HomeDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Home', 'Delete');
        if($this->isEmptyErrors()){
            $myData =  $this->getObj();
            foreach ($this->getModel2()['AllNamesLanguage'] as $key => $value) 
                if(count($myData[$key]['MyFlexTables']) === 1)
                    unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables']);
                else
                    unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables'][$_POST['id']]);
            if(isset($myData[$_POST['id']]))
                unset($myData[$_POST['id']]);
            $this->saveModel($myData);
            $view = new MyHome();
            $this->showToast($this->getToastMessage());
            include 'home_view.php';
        }else{
            $view = new MyHome();
            $this->displayErrors();
            include 'home_view.php';
        }
    }
}
new HomeDeletePost();
}else
    header('LOCATION:Home');