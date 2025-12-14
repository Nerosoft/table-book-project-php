<?php
require 'LoginRegister.php';
class Login extends LoginRegister{
    private $ButtonForgetPassword;
    private $model;
    function __construct(){
        $this->model = new ModelJson();
        parent::__construct($this);
        $this->ButtonForgetPassword = $this->getModel2()[$this->getUrlName2()]['ButtonForgetPassword'];
    }
    function isValid(){
        if($this->isEmptyErrors()){
           foreach ($this->getUsers() as $key => $value)
                if($value->getEmail() === $_POST['Email'] && $value->getPassword() === $_POST['Password']){
                    $_SESSION['userId'] = $_POST['superId'];
                    $_SESSION['staticId'] = $_POST['superId'];
                    header('Location:Home.php');
                    exit;
                }
            $this->setErrors($this->getModel2()[$this->getUrlName2()]['EmailPassword']);
        }
    }
    function getModel(){
        return $this->model;
    }
    function getModel2(){
        return $this->model->getInfo($this);
    }
    function getButtonForgetPassword(){
        return $this->ButtonForgetPassword;
    }
}
$view = new Login();
?>
<div class="container">
    <div class="register">
        <form id='register' method='POST' action="login.php">
            <?php include 'login_form.php'?>
        </form>
        <?php include 'change_language_model.php';?>
        <button type="button" class="btn btn-primary" ><?php echo $view->getButtonForgetPassword()?></button>
    </div>
</div>
</body>
</html>