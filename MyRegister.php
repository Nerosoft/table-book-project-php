<?php
require 'LoginRegister.php';
require 'ErrorRegister.php';
class MyRegister extends LoginRegister{    
    use ErrorRegister;
    private $LabelConfirmPassword;
    private $HintConfirmPassword;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    function __construct(){
        parent::__construct('Register');
        $this->initErrorsRegister($this->getModelPage());
        $this->LabelConfirmPassword = $this->getModel2()[$this->getUrlName2()]['LabelConfirmPassword'];
        $this->HintConfirmPassword = $this->getModel2()[$this->getUrlName2()]['HintConfirmPassword'];
        $this->LabelKeyPassword = $this->getModel2()[$this->getUrlName2()]['LabelKeyPassword'];
        $this->HintKeyPassword = $this->getModel2()[$this->getUrlName2()]['HintKeyPassword'];
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