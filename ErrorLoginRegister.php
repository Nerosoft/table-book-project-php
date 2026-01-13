<?php
require 'ErrorsEmailPassword.php';
trait ErrorLoginRegister{
    use ErrorsEmailPassword;
    private $ChangeLang;
    public function initErrorsLoginRegister($error){
        $this->initErrorsEmailPassword($error);
        $this->ChangeLang = $error['UsedLanguage'];
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
}