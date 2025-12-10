<?php
session_start();
if(isset($_SESSION['userId']))
    header("Location: home.php");
else{
    require 'InformationPage.php';
    require 'Language.php';
    require 'Users.php';
    class LoginRegister extends InformationPage{
        private $TitleForm;
        private $LabelEmail;
        private $HintEmail;
        private $LabelPassword;
        private $HintPassword;
        private $ButtonName;
        private $RequiredEmail;
        private $InvalidEmail;
        private $RequiredPassword;
        private $InvalidPassword;
        private $MyLanguage;
        private $ChangeLanguageButton;
        private $ModelTitle;
        private $ModelButton;
        private $ChangeLang;
        private $users;
        function getUsers(){
            return $this->users;
        }
        function __construct($obj){
            $lang = isset($_COOKIE[$obj->getModel()->getId()]) && isset($obj->getModel()->getObj()[$_COOKIE[$obj->getModel()->getId()]])?$_COOKIE[$obj->getModel()->getId()]:$obj->getModel()->getObj()['Setting']['Language'];
            $this->RequiredEmail = $obj->getModel()->getObj()[$lang][$this->getUrlName2()]['RequiredEmail'];
            $this->InvalidEmail = $obj->getModel()->getObj()[$lang][$this->getUrlName2()]['InvalidEmail'];
            $this->RequiredPassword = $obj->getModel()->getObj()[$lang][$this->getUrlName2()]['RequiredPassword'];
            $this->InvalidPassword = $obj->getModel()->getObj()[$lang][$this->getUrlName2()]['InvalidPassword'];
            if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])){
                parent::__construct($lang, $obj);
                include 'title_html.php';
                $this->showCustomeMessage(function()use($obj){
                    if(isset($_POST['superId']) && isset($obj->getModel()->getFile()[$_POST['superId']]) && isset($obj->getModel2()['AllNamesLanguage'][$_POST['id']])){
                        setcookie($obj->getModel()->getId(), $_POST['id'], time()+2628000);
                        $this->setLanguage($_POST['id']);
                        $toast = $obj->getModel2()["AppLanguage"]["ChangeLanguage"];
                    }else{
                        //show page with error
                        $toast = $obj->getModel2()["AppLanguage"]["LangIdReq"];
                        $type = 'danger';
                    }
                    include 'toast_message.php';
                });
            }else if($_SERVER["REQUEST_METHOD"] === "POST"){
                parent::__construct($lang);
                include 'title_html.php';
                if(!(isset($_POST['superId']) && isset($obj->getModel()->getFile()[$_POST['superId']])))
                    $this->setErrors($this->getInvalidEmail());
                if(!isset($_POST['Email']) || isset($_POST['Email']) && $_POST['Email'] === '')
                    $this->setErrors($this->getRequiredEmail());
                else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
                    $this->setErrors($this->getInvalidEmail());
                if(!isset($_POST['Password']) || $_POST['Password'] === '')
                    $this->setErrors($this->getRequiredPassword());
                else if(strlen($_POST['Password']) < 8)
                    $this->setErrors($this->getInvalidPassword());
                $this->users = isset($this->getModel()->getObj()['Users']) ? Users::fromArray($this->getModel()->getObj()['Users']):array();
                $obj->isValid();
                $this->setTitle($obj->getModel2()[$this->getUrlName2()]['Title']);
                $this->showCustomeMessage(function($type = 'danger'){
                    foreach ($this->getErrors() as $key => $toast)
                        include 'toast_message.php'; 
                });
                  
            }else{
                parent::__construct($lang, $obj);
                include 'title_html.php';
            }
            $this->TitleForm = $obj->getModel2()[$this->getUrlName2()]['TitleForm'];
            $this->LabelEmail = $obj->getModel2()[$this->getUrlName2()]['LabelEmail'];
            $this->HintEmail = $obj->getModel2()[$this->getUrlName2()]['HintEmail'];
            $this->LabelPassword = $obj->getModel2()[$this->getUrlName2()]['LabelPassword'];
            $this->HintPassword = $obj->getModel2()[$this->getUrlName2()]['HintPassword'];
            $this->MyLanguage = Language::makeAllLanguage($obj->getModel2()['AllNamesLanguage']);
            $this->ButtonName = $obj->getModel2()[$this->getUrlName2()]['ButtonName'];
            $this->ChangeLanguageButton = $obj->getModel2()[$this->getUrlName2()]['ChangeLanguageButton'];
            $this->ModelTitle = $obj->getModel2()[$this->getUrlName2()]['ModelTitle'];
            $this->ModelButton = $obj->getModel2()[$this->getUrlName2()]['ModelButton'];
            $this->ChangeLang = $obj->getModel2()[$this->getUrlName2()]['ChangeLang'];
        }
        function getChangeLang(){
            return $this->ChangeLang;
        }
        function getChangeLanguageButton(){
            return $this->ChangeLanguageButton;
        }
        function getModelTitle(){
            return $this->ModelTitle;
        }
        function getModelButton(){
            return $this->ModelButton;
        }
        function getMyLanguage(){
            return $this->MyLanguage;
        }
        function getTitleForm(){
            return $this->TitleForm;
        }
        function getLabelEmail(){
            return $this->LabelEmail;
        }
        function getHintEmail(){
            return $this->HintEmail;
        }
        function getLabelPassword(){
            return $this->LabelPassword;
        }
        function getHintPassword(){
            return $this->HintPassword;
        }
        function getButtonName(){
            return $this->ButtonName;
        }
        function getRequiredEmail(){
            return $this->RequiredEmail;
        }
        function getInvalidEmail(){
            return $this->InvalidEmail;
        }
        function getRequiredPassword(){
            return $this->RequiredPassword;
        }
        function getInvalidPassword(){
            return $this->InvalidPassword;
        }
    }
}