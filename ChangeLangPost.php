<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && $_POST['change_language'] === 'Login' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && $_POST['change_language'] === 'Register'){
    $_SERVER['SCRIPT_FILENAME'] = $_POST['change_language'];
    require  $_POST['change_language'] === 'Login'?'MyLogin.php':'MyRegister.php';
    require 'ValidationId.php';
    class ChangeLangPost extends ValidationId{
        function __construct(){
            parent::__construct($_POST['change_language'], 'ChangeLang');
            if(!isset($_POST['superId']) || !isset($this->getFile()[$_POST['superId']])){
                $this->setErrors($this->getModelPage()['DbIdInv']);
            }
            if($this->isEmptyErrors()){
                setcookie($this->getId(), $_POST['id'], time()+2628000);
                $_COOKIE[$this->getId()] = $_POST['id'];
                $view = $_POST['change_language'] === 'Login'?new MyLogin():new MyRegister();
                $this->showToast($this->getToastMessage());
                include $_POST['change_language'] === 'Login'?'login_view.php':'register_view.php';
            }else{
                $view = $_POST['change_language'] === 'Login'?new MyLogin():new MyRegister();
                $this->displayErrors();
                include $_POST['change_language'] === 'Login'?'login_view.php':'register_view.php';
            }
        }
    }
new ChangeLangPost();
}else
    header('LOCATION:Login');