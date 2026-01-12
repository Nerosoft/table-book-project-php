<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyLogin.php';
    require 'ValidationLoginRegister.php';
    class LoginPost extends ValidationLoginRegister{
        function __construct(){
            parent::__construct('Login');
            $view = new MyLogin();
            if($this->isEmptyErrors()){
                foreach ($this->getUsers() as $key => $value)
                    if($value->getEmail() === $_POST['Email'] && $value->getPassword() === $_POST['Password']){
                        $this->redirectToAdminPage();
                        exit;
                    }
                $this->showToast($this->getModelPage()['EmailPassword'], 'danger');
            }else
                $this->displayErrors();
            include 'login_view.php';
        }
    }
    new LoginPost();
}else
    header('LOCATION:Login.php');