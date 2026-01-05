<?php
include 'SessionAuth.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require 'MyLogin.php';
    require 'ValidationLoginRegister.php';
    class LoginPost extends ValidationLoginRegister{
        function __construct(){
            parent::__construct('Login');
            if($this->isEmptyErrors()){
                foreach ($this->getUsers() as $key => $value)
                    if($value->getEmail() === $_POST['Email'] && $value->getPassword() === $_POST['Password']){
                        $this->redirectToAdminPage();
                        exit;
                    }
                $this->setErrors($this->getModel2()[$this->getUrlName2()]['EmailPassword']);
            }
        }
    }
    $view2 = new LoginPost();
    $view = new MyLogin();
    include 'login_view.php';
}else
    header('LOCATION:Login.php');