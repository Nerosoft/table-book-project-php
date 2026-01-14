<?php
require 'ErrorsPassword.php';
trait ErrorLoginRegister{
    use ErrorsPassword;
    private $ChangeLang;
    public function initErrorsLoginRegister($error){
        $this->initErrorsPassword($error);
        $this->ChangeLang = $error['UsedLanguage'];
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
}