<?php
require 'ErrorsPassword.php';
require 'ErrorsHomeName.php';
trait ErrorLoginRegister{
    use ErrorsPassword, ErrorsHomeName;
    private $ChangeLang;
    function initErrorsLoginRegister($error){
        $this->initErrorsPassword($error);
        $this->initErrorsHomeName($error);
        $this->ChangeLang = $error['UsedLanguage'];
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
}