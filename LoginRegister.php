<?php
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
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->RequiredEmail = $this->getModel2()[$this->getUrlName2()]['RequiredEmail'];
        $this->InvalidEmail = $this->getModel2()[$this->getUrlName2()]['InvalidEmail'];
        $this->RequiredPassword = $this->getModel2()[$this->getUrlName2()]['RequiredPassword'];
        $this->InvalidPassword = $this->getModel2()[$this->getUrlName2()]['InvalidPassword'];
        $this->TitleForm = $this->getModel2()[$this->getUrlName2()]['TitleForm'];
        $this->LabelEmail = $this->getModel2()[$this->getUrlName2()]['LabelEmail'];
        $this->HintEmail = $this->getModel2()[$this->getUrlName2()]['HintEmail'];
        $this->LabelPassword = $this->getModel2()[$this->getUrlName2()]['LabelPassword'];
        $this->HintPassword = $this->getModel2()[$this->getUrlName2()]['HintPassword'];
        $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
        $this->ButtonName = $this->getModel2()[$this->getUrlName2()]['ButtonName'];
        $this->ChangeLanguageButton = $this->getModel2()[$this->getUrlName2()]['ChangeLanguageButton'];
        $this->ModelTitle = $this->getModel2()[$this->getUrlName2()]['ModelTitle'];
        $this->ModelButton = $this->getModel2()[$this->getUrlName2()]['ModelButton'];
        $this->ChangeLang = $this->getModel2()[$this->getUrlName2()]['UsedLanguage'];
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
