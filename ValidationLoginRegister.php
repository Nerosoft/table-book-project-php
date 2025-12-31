<?php
require 'Users.php';
require 'MessageError.php';
class ValidationLoginRegister extends MessageError{
    private $users;
    function getUsers(){
        return $this->users;
    }
    function redirectToAdminPage(){
        $_SESSION['userId'] = $_POST['superId'];
        $_SESSION['staticId'] = $_POST['superId'];
        header('Location:Home.php');
    }
    function __construct($view){
        parent::__construct($view);
        $this->users = isset($this->getView()->getObj()['Users']) ? Users::fromArray($this->getView()->getObj()['Users']):array();
        if(!isset($_POST['superId']) || !isset($this->getView()->getFile()[$_POST['superId']])){
            $this->setErrors($this->getView()->getModelPage()['DbIdInv']);
        }
        if(!isset($_POST['Email']) || $_POST['Email'] === '')
            $this->setErrors($this->getView()->getRequiredEmail());
        else if(!preg_match('/^[\w]+@[\w]+\.[a-zA-z]{2,6}$/', $_POST['Email']))
            $this->setErrors($this->getView()->getInvalidEmail());
        if(!isset($_POST['Password']) || $_POST['Password'] === '')
            $this->setErrors($this->getView()->getRequiredPassword());
        else if(strlen($_POST['Password']) < 8)
            $this->setErrors($this->getView()->getInvalidPassword());
    }
    function getEmailExist(){
        if(isset($_POST['Email']) && in_array($_POST['Email'], array_map(function($obj) {return $obj->getEmail();}, $this->getUsers())))
            $this->setErrors($this->getView()->getModel2()[$this->getView()->getUrlName2()]['EmailExist']);
    }
}
?>