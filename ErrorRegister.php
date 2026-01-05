<?php
trait ErrorRegister{
    private $RequiredConfirmPassword;
    private $InvalidConfirmPassword;
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    private $PasswordDosNotMatch;
    public function initErrorsRegister($page){
        $this->RequiredConfirmPassword = $page['RequiredConfirmPassword'];
        $this->InvalidConfirmPassword = $page['InvalidConfirmPassword'];
        $this->RequiredKeyPassword = $page['RequiredKeyPassword'];
        $this->InvalidKeyPassword = $page['InvalidKeyPassword'];
        $this->PasswordDosNotMatch = $page['PasswordDosNotMatch'];
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
}