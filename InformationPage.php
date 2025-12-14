<?php
require 'ModelJson.php';
require 'Users.php';
class InformationPage{
    private $Title;
    private $Language;
    private $Errors = array();
    private $users;
    function getUsers(){
        return $this->users;
    }
    function setErrors($error){
        array_push($this->Errors, $error);
    }
    function getErrors(){
        return $this->Errors;
    }
    function isEmptyErrors(){
        return empty($this->Errors);
    }
    function __construct($language, $obj){
        $this->Language = $language;
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['superId']) && isset($obj->getModel()->getFile()[$_POST['superId']]) && isset($_POST['Email']) && isset($_POST['Password']) && $this->getUrlName2() === 'Login' || $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['superId']) && isset($obj->getModel()->getFile()[$_POST['superId']]) && isset($_POST['Email']) && isset($_POST['Password']) && $this->getUrlName2() === 'Register'){
            if($_POST['Email'] === '')
                $this->setErrors($this->getRequiredEmail());
            else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
                $this->setErrors($this->getInvalidEmail());
            if($_POST['Password'] === '')
                $this->setErrors($this->getRequiredPassword());
            else if(strlen($_POST['Password']) < 8)
                $this->setErrors($this->getInvalidPassword());
            $this->users = isset($this->getModel()->getObj()['Users']) ? Users::fromArray($this->getModel()->getObj()['Users']):array();
            $obj->isValid();
            $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
            include 'title_html.php';
            $this->showCustomeMessage(function($type = 'danger'){
                foreach ($this->getErrors() as $key => $toast)
                    include 'toast_message.php'; 
            });
        }else if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['brancChange']) && isset($_SESSION['userId']) && isset($_SESSION['staticId']))
            $this->showCustomeMessage(function()use($obj){
                if(isset($obj->getModel()->getBranch()[$_POST['brancChange']]) || $_SESSION['staticId'] === $_POST['brancChange']){
                    $obj->getModel()->resetId();
                    $this->Language = $obj->getModel()->getObj()['Setting']['Language'];
                    if($this->getSCRIPTFILENAME() === 'MyFlexTables' && !isset($this->getModel2()[$_GET['id']])){
                        header("Location: home.php");
                        exit;
                    }else if($this->getSCRIPTFILENAME() === 'SystemLang' && !(isset($_GET['lang']) && isset($_GET['table']) && isset($obj->getModel()->getObj()[$_GET['lang']][$_GET['table']]))){
                        header("Location: SystemLang.php");
                        exit;
                    }
                    $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
                    include 'admin_title.php';
                    $toast = $obj->getModel2()['Branches']['SuccessfullyChangeBranch'];
                }else{
                    $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
                    include 'admin_title.php';
                    $toast = $obj->getModel2()['Branches']['ErrorChangeBranch'];
                    $type = 'danger';
                }
                include 'toast_message.php';
            });
        else if($_SERVER["REQUEST_METHOD"] === "POST" && $this->getUrlName2() === 'SystemLang'){
            $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
            include 'admin_title.php';
            $obj->isValid();
        }else if( $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id']) && isset($_SESSION['userId']) && isset($_SESSION['staticId'])||
            $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['id']) && isset($_POST['superId']) && isset($obj->getModel()->getFile()[$_POST['superId']]) && $this->getUrlName2() === 'Login'||
            $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_language']) && isset($_POST['id']) && isset($_POST['superId']) && isset($obj->getModel()->getFile()[$_POST['superId']]) && $this->getUrlName2() === 'Register'){
            $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
            if($_POST['id'] === '')
                $this->setErrors($obj->getModel2()[$this->getUrlName2()]['IdIsReq']);
            else if(
            !isset($obj->getModel()->getBranch()[$_POST['id']]) && $this->getUrlName2() === 'Branches' ||
            $obj->getModel()->getId() === $_POST['id'] && $this->getUrlName2() === 'Branches' && isset($_POST['deleting'])||
            !isset($obj->getModel2()['MyFlexTables'][$_POST['id']]) && $this->getUrlName2() === 'Home'||
            isset($_GET['id']) && !isset($this->getModel()->getObj()[$_GET['id']][$_POST['id']]) && $this->getSCRIPTFILENAME() === 'MyFlexTables' ||
            !isset($obj->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'ChangeLanguage'||
            $_POST['id'] === $this->getLanguage() && $this->getUrlName2() === 'ChangeLanguage' && isset($_POST['deleting'])||
            !isset($obj->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'Login'||
            !isset($obj->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'Register')
                $this->setErrors($obj->getModel2()[$this->getUrlName2()]['IdIsInv']);
            if($this->isEmptyErrors() && isset($_POST['deleting']))
                $obj->makeDeleteItem();
            else if($this->isEmptyErrors() && isset($_POST['change_language'])){
                $obj->makeChangeLanguage();
                $this->setLanguage($_POST['id']);
            }else if($this->isEmptyErrors())
                $obj->isValid();   
                
                
            $this->showCustomeMessage(function()use($obj){
                include $this->getUrlName2() === 'Login' || $this->getUrlName2() === 'Register'?'title_html.php':'admin_title.php';
                if($this->isEmptyErrors()){
                    $toast = $obj->getModel2()[$this->getUrlName2()][isset($_POST['deleting'])?'Delete':(isset($_POST['change_language']) ? 'ChangeLang' :'MessageModelEdit')];
                    include 'toast_message.php';
                }else{
                    $type = 'danger';
                    foreach ($this->getErrors() as $key => $toast)
                        include 'toast_message.php'; 
                }
            });
        }else if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
            $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
            include 'admin_title.php';
            $obj->isValid();
            $this->showCustomeMessage(function()use($obj){
                if($this->isEmptyErrors()){
                    $toast = $obj->getModel2()[$this->getUrlName2()]['MessageModelCreate'];
                    include 'toast_message.php';
                }else{
                    $type = 'danger';
                    foreach ($this->getErrors() as $key => $toast)
                        include 'toast_message.php'; 
                }
            });
        }else if(isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
            $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
            include 'admin_title.php';
            $this->showCustomeMessage(function($type = 'success')use($obj){
                $toast = $obj->getModel2()[$this->getUrlName2()]['LoadMessage'];
                include 'toast_message.php'; 
            });  
        }else{
            $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
            include 'title_html.php';
        }
        

    }
    function getTitle(){
        return $this->Title;
    }
    function getLanguage(){
        return $this->Language;
    }
    function setLanguage($lang){
        $this->Language = $lang;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
    function showCustomeMessage($callback){
        echo'<div style="position: fixed; top: 0px; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">';
        $callback();
        echo'</div>';
    }
    function getUrlName2(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'MyFlexTables'?$_GET['id']:pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
    function getSCRIPTFILENAME(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
}