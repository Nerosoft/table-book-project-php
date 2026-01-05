<?php
trait ErrorLoginRegister{
    private $RequiredEmail;
    private $InvalidEmail;
    private $RequiredPassword;
    private $InvalidPassword;
    private $ChangeLang;
    public function initErrorsLoginRegister($page){
        $this->RequiredEmail = $page['RequiredEmail'];
        $this->InvalidEmail = $page['InvalidEmail'];
        $this->RequiredPassword = $page['RequiredPassword'];
        $this->InvalidPassword = $page['InvalidPassword'];
        $this->ChangeLang = $page['UsedLanguage'];
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
    function getChangeLang(){
        return $this->ChangeLang;
    }
}