<?php
trait ErrorsKeyPassword{
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    public function initErrorsKeyPassword($error){
        $this->RequiredKeyPassword = $error['RequiredKeyPassword'];
        $this->InvalidKeyPassword = $error['InvalidKeyPassword'];
    }
    function getRequiredKeyPassword(){
        return $this->RequiredKeyPassword;
    }
    function getInvalidKeyPassword(){
        return $this->InvalidKeyPassword;
    }
}