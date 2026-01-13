<?php
require 'ErrorsKeyPassword.php';
trait ErrorRegister{
    use ErrorsKeyPassword;
    private $RequiredConfirmPassword;
    private $InvalidConfirmPassword;
    private $PasswordDosNotMatch;
    public function initErrorsRegister($error){
        $this->initErrorsKeyPassword($error);
        $this->RequiredConfirmPassword = $error['RequiredConfirmPassword'];
        $this->InvalidConfirmPassword = $error['InvalidConfirmPassword'];
        $this->PasswordDosNotMatch = $error['PasswordDosNotMatch'];
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
}