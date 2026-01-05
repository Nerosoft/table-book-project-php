<?php
require 'InformationPage.php';
require 'MyLanguage.php';
require 'ErrorLoginRegister.php';
class LoginRegister extends InformationPage{
    use ErrorLoginRegister;
    private $TitleForm;
    private $LabelEmail;
    private $HintEmail;
    private $LabelPassword;
    private $HintPassword;
    private $ButtonName;
    private $MyLanguage;
    private $ChangeLanguageButton;
    private $ModelTitle;
    private $ModelButton;
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->initErrorsLoginRegister($this->getModelPage());
        $this->TitleForm = $this->getModelPage()['TitleForm'];
        $this->LabelEmail = $this->getModelPage()['LabelEmail'];
        $this->HintEmail = $this->getModelPage()['HintEmail'];
        $this->LabelPassword = $this->getModelPage()['LabelPassword'];
        $this->HintPassword = $this->getModelPage()['HintPassword'];
        $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
        $this->ButtonName = $this->getModelPage()['ButtonName'];
        $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton'];
        $this->ModelTitle = $this->getModelPage()['ModelTitle'];
        $this->ModelButton = $this->getModelPage()['ModelButton'];
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
}
