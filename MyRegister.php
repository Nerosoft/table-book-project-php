<?php
require 'LoginRegister.php';
class MyRegister extends LoginRegister{
    private $RequiredConfirmPassword;
    private $InvalidConfirmPassword;
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    private $LabelConfirmPassword;
    private $HintConfirmPassword;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    private $PasswordDosNotMatch;
    function __construct(){
        parent::__construct('Register');
        $this->RequiredConfirmPassword = $this->getModel2()[$this->getUrlName2()]['RequiredConfirmPassword'];
        $this->InvalidConfirmPassword = $this->getModel2()[$this->getUrlName2()]['InvalidConfirmPassword'];
        $this->RequiredKeyPassword = $this->getModel2()[$this->getUrlName2()]['RequiredKeyPassword'];
        $this->InvalidKeyPassword = $this->getModel2()[$this->getUrlName2()]['InvalidKeyPassword'];
        $this->LabelConfirmPassword = $this->getModel2()[$this->getUrlName2()]['LabelConfirmPassword'];
        $this->HintConfirmPassword = $this->getModel2()[$this->getUrlName2()]['HintConfirmPassword'];
        $this->LabelKeyPassword = $this->getModel2()[$this->getUrlName2()]['LabelKeyPassword'];
        $this->HintKeyPassword = $this->getModel2()[$this->getUrlName2()]['HintKeyPassword'];
        $this->PasswordDosNotMatch = $this->getModel2()[$this->getUrlName2()]['PasswordDosNotMatch'];
    }
    function getPasswordDosNotMatch(){
        return $this->PasswordDosNotMatch;
    }
    function getRequiredConfirmPassword(){
        return $this->RequiredConfirmPassword;
    }
    function getInvalidConfirmPassword(){
        return $this->InvalidConfirmPassword;
    }
    function getRequiredKeyPassword(){
        return $this->RequiredKeyPassword;
    }
    function getInvalidKeyPassword(){
        return $this->InvalidKeyPassword;
    }
    function getLabelConfirmPassword(){
        return $this->LabelConfirmPassword;
    }
    function getHintConfirmPassword(){
        return $this->HintConfirmPassword;
    }
    function getLabelKeyPassword(){
        return $this->LabelKeyPassword;
    }
    function getHintKeyPassword(){
        return $this->HintKeyPassword;
    }
}