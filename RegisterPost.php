<?php 
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyRegister.php';
    require 'ValidationLoginRegister.php';
    class RegisterPost extends ValidationLoginRegister{
        function __construct(){
            parent::__construct(new MyRegister());
            $this->getEmailExist();
            if(!isset($_POST['password_confirmation']) || $_POST['password_confirmation'] === '')
                $this->setErrors($this->getView()->getRequiredConfirmPassword());
            else if(strlen($_POST['password_confirmation']) < 8)
                $this->setErrors($this->getView()->getInvalidConfirmPassword());
            else if($_POST['Password'] !== $_POST['Password'] && strlen($_POST['Password']) >= 8)
                $this->setErrors($this->getView()->getPasswordDosNotMatch());
            if(!isset($_POST['Key']) || $_POST['Key'] === '')
                $this->setErrors($this->getView()->getRequiredKeyPassword());
            else if(strlen($_POST['Key']) < 8)
                $this->setErrors($this->getView()->getInvalidKeyPassword());
            else if($this->isEmptyErrors()){
                $this->redirectToAdminPage();
                $allUsers = $this->getView()->getObj();
                unset($_POST['superId'], $_POST['password_confirmation']);
                $allUsers['Users'][$this->getRandomId()] = $_POST;
                $this->getView()->saveModel($allUsers);
                exit;
            }
        }
    }
    $view2 = new RegisterPost();
    $view = $view2->getView();
    include 'register_view.php';
}else
    header('LOCATION:Register.php');