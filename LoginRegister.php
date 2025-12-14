<?php
session_start();
if(isset($_SESSION['userId']))
    header("Location: home.php");
else{
    require 'InformationPage.php';
    require 'MyLanguage.php';
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
        private $obj;
        
        function makeChangeLanguage(){
            setcookie($this->obj->getModel()->getId(), $_POST['id'], time()+2628000);
        }
        function __construct($obj){
            $this->obj = $obj;
            $lang = isset($_COOKIE[$this->obj->getModel()->getId()]) && isset($this->obj->getModel()->getObj()[$_COOKIE[$this->obj->getModel()->getId()]])?$_COOKIE[$this->obj->getModel()->getId()]:$this->obj->getModel()->getObj()['Setting']['Language'];
            $this->RequiredEmail = $this->obj->getModel()->getObj()[$lang][$this->getUrlName2()]['RequiredEmail'];
            $this->InvalidEmail = $this->obj->getModel()->getObj()[$lang][$this->getUrlName2()]['InvalidEmail'];
            $this->RequiredPassword = $this->obj->getModel()->getObj()[$lang][$this->getUrlName2()]['RequiredPassword'];
            $this->InvalidPassword = $this->obj->getModel()->getObj()[$lang][$this->getUrlName2()]['InvalidPassword'];
            parent::__construct($lang, $this->obj);
            $this->TitleForm = $this->obj->getModel2()[$this->getUrlName2()]['TitleForm'];
            $this->LabelEmail = $this->obj->getModel2()[$this->getUrlName2()]['LabelEmail'];
            $this->HintEmail = $this->obj->getModel2()[$this->getUrlName2()]['HintEmail'];
            $this->LabelPassword = $this->obj->getModel2()[$this->getUrlName2()]['LabelPassword'];
            $this->HintPassword = $this->obj->getModel2()[$this->getUrlName2()]['HintPassword'];
            $this->MyLanguage = MyLanguage::fromArray($this->obj);
            $this->ButtonName = $this->obj->getModel2()[$this->getUrlName2()]['ButtonName'];
            $this->ChangeLanguageButton = $this->obj->getModel2()[$this->getUrlName2()]['ChangeLanguageButton'];
            $this->ModelTitle = $this->obj->getModel2()[$this->getUrlName2()]['ModelTitle'];
            $this->ModelButton = $this->obj->getModel2()[$this->getUrlName2()]['ModelButton'];
            $this->ChangeLang = $this->obj->getModel2()[$this->getUrlName2()]['UsedLanguage'];
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