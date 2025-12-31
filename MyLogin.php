<?php
require 'LoginRegister.php';
class MyLogin extends LoginRegister{
    private $ButtonForgetPassword;
    function __construct(){
        parent::__construct('Login');
        $this->ButtonForgetPassword = $this->getModel2()[$this->getUrlName2()]['ButtonForgetPassword'];
    }
    function getButtonForgetPassword(){
        return $this->ButtonForgetPassword;
    }
}