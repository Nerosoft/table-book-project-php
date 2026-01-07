<?php
include 'SessionAdmin.php';
require 'MySystemlang.php';
require 'MessageError.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
class SystemLangEditPost extends MessageError{
    use ErrorSystemlang;
    private $ToastMessage;
    function getToastMessage(){
        return $this->ToastMessage;
    }
    function __construct(){
        parent::__construct('SystemLang');
        $this->initErrorSystemlang($this->getModelPage());
        $this->ToastMessage = $this->getModelPage()['AllLanguageEdit'];
        if(!isset($_POST['word']) || $_POST['word'] === '')
            $this->setErrors($this->getTextRequired());
        else if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || strlen($_POST['word']) < 3 || !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            $this->setErrors($this->getTextLenght());
        if($this->isEmptyErrors()){
            $file = $this->getObj();
            if(isset($_GET['array']))
                $file[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
            else
                $file[$_GET['lang']][$_GET['table']][$_GET['key']] = $_POST['word'];
            $this->saveModel($file);
        }
    }
}
$view2 = new SystemLangEditPost();
$view = new MySystemlang();
include 'SystemLang_view.php';
}else
    header('LOCATION:SystemLang');