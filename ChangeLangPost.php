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
            }else if($this->isEmptyErrors()){
                setcookie($this->getId(), $_POST['id'], time()+2628000);
                $_COOKIE[$this->getId()] = $_POST['id'];
            }
        }
    }
    $view2 = new ChangeLangPost();
    $view = $_POST['change_language'] === 'Login'?new MyLogin():new MyRegister();
    include $_POST['change_language'] === 'Login'?'login_view.php':'register_view.php';
}else
    header('LOCATION:Login');