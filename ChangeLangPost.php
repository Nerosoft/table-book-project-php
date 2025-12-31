<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && $_POST['change_language'] === 'Login' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && $_POST['change_language'] === 'Register'){
    $_SERVER['SCRIPT_FILENAME'] = $_POST['change_language'];
    require  $_POST['change_language'] === 'Login'?'MyLogin.php':'MyRegister.php';
    require 'ValidationId.php';
    class ChangeLangPost extends ValidationId{
        function __construct(){
            $view = $_POST['change_language'] === 'Login'?new MyLogin():new MyRegister();
            if(!isset($_POST['superId']) || !isset($view->getFile()[$_POST['superId']])){
                parent::__construct($view, 'ChangeLang');
                $this->setErrors($this->getView()->getModelPage()['DbIdInv']);
            }else
                parent::__construct($view, 'ChangeLang');
            if($this->isEmptyErrors()){
                setcookie($this->getView()->getId(), $_POST['id'], time()+2628000);
                $this->getView()->setLanguage($_POST['id']);
            }
        }
    }
    $view2 = new ChangeLangPost();
    $view = $view2->getView();
    include $_POST['change_language'] === 'Login'?'login_view.php':'register_view.php';
}else
    header('LOCATION:Login');