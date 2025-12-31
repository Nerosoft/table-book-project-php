<?php
include 'SessionAdmin.php';
require 'MessageError.php';
require 'MySystemlang.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class SystemLangEditPost extends MessageError{
    function showSuccessMessage(){
        $this->getView()->showCustomeMessage(function(){
            $toast = $this->getView()->getModelPage()['AllLanguageEdit'];
            include 'toast_message.php';
        });
    }
    function __construct(){
        parent::__construct(new MySystemlang());
        if(!isset($_POST['word']) || $_POST['word'] === '')
            $this->setErrors($this->getView()->getTextRequired());
        else if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || strlen($_POST['word']) < 3 || !isset($this->getView()->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getView()->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            $this->setErrors($this->getView()->getTextLenght());
        if($this->isEmptyErrors()){
            $file = $this->getView()->getObj();
            if(isset($_GET['array']))
                $file[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
            else
                $file[$_GET['lang']][$_GET['table']][$_GET['key']] = $_POST['word'];
            $this->getView()->saveModel($file);
        }
    }
}
$view2 = new SystemLangEditPost();
$view = $view2->getView();
include 'SystemLang_view.php';
}else
    header('LOCATION:SystemLang');