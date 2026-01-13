<?php
require 'LoginRegister.php';
class MyLogin extends LoginRegister{
    private $ButtonForgetPassword;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Login', $message, $type);
        $this->ButtonForgetPassword = $this->getModelPage()['ButtonForgetPassword'];
    }
    function getButtonForgetPassword(){
        return $this->ButtonForgetPassword;
    }
}