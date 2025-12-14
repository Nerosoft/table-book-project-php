<?php
require 'LoginRegister.php';
class Register extends LoginRegister{
    private $RequiredConfirmPassword;
    private $InvalidConfirmPassword;
    private $RequiredKeyPassword;
    private $InvalidKeyPassword;
    private $LabelConfirmPassword;
    private $HintConfirmPassword;
    private $LabelKeyPassword;
    private $HintKeyPassword;
    private $PasswordDosNotMatch;
    private $model;
    function __construct(){
        $this->model = new ModelJson();
        $this->RequiredConfirmPassword = $this->getModel()->getObj()[isset($_COOKIE[$this->getModel()->getId()]) && isset($this->getModel()->getObj()[$_COOKIE[$this->getModel()->getId()]]) ? $_COOKIE[$this->getModel()->getId()] : $this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['RequiredConfirmPassword'];
        $this->InvalidConfirmPassword = $this->getModel()->getObj()[isset($_COOKIE[$this->getModel()->getId()]) && isset($this->getModel()->getObj()[$_COOKIE[$this->getModel()->getId()]]) ? $_COOKIE[$this->getModel()->getId()] : $this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['InvalidConfirmPassword'];
        $this->RequiredKeyPassword = $this->getModel()->getObj()[isset($_COOKIE[$this->getModel()->getId()]) && isset($this->getModel()->getObj()[$_COOKIE[$this->getModel()->getId()]]) ? $_COOKIE[$this->getModel()->getId()] : $this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['RequiredKeyPassword'];
        $this->InvalidKeyPassword = $this->getModel()->getObj()[isset($_COOKIE[$this->getModel()->getId()]) && isset($this->getModel()->getObj()[$_COOKIE[$this->getModel()->getId()]]) ? $_COOKIE[$this->getModel()->getId()] : $this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['InvalidKeyPassword'];
        parent::__construct($this);
        $this->LabelConfirmPassword = $this->getModel2()[$this->getUrlName2()]['LabelConfirmPassword'];
        $this->HintConfirmPassword = $this->getModel2()[$this->getUrlName2()]['HintConfirmPassword'];
        $this->LabelKeyPassword = $this->getModel2()[$this->getUrlName2()]['LabelKeyPassword'];
        $this->HintKeyPassword = $this->getModel2()[$this->getUrlName2()]['HintKeyPassword'];
        $this->PasswordDosNotMatch = $this->getModel2()[$this->getUrlName2()]['PasswordDosNotMatch'];
    }
    function isValid(){
        if(in_array($_POST['Email'], array_map(function($obj) {return $obj->getEmail();}, $this->getUsers())))
            $this->setErrors($this->getModel2()[$this->getUrlName2()]['EmailExist']);
        if(!isset($_POST['password_confirmation']) || $_POST['password_confirmation'] === '')
            $this->setErrors($this->getRequiredConfirmPassword());
        else if(strlen($_POST['password_confirmation']) < 8)
            $this->setErrors($this->getInvalidConfirmPassword());
        else if($_POST['Password'] !== $_POST['Password'] && strlen($_POST['Password']) >= 8)
            $this->setErrors($this->getPasswordDosNotMatch());
        if(!isset($_POST['Key']) || $_POST['Key'] === '')
            $this->setErrors($this->getRequiredKeyPassword());
        else if(strlen($_POST['Key']) < 8)
            $this->setErrors($this->getInvalidKeyPassword());
        

        if($this->isEmptyErrors()){
            $_SESSION['userId'] = $_POST['superId'];
            $_SESSION['staticId'] = $_POST['superId'];
            $allUsers = $this->getModel()->getObj();
            unset($_POST['superId'], $_POST['password_confirmation']);
            $allUsers['Users'][$this->getModel()->getRandomId()] = $_POST;
            $this->getModel()->saveModel($allUsers);
            header('Location:Home.php');
            exit;
        }
    }
    function getModel(){
        return $this->model;
    }
    function getModel2(){
        return $this->model->getInfo($this);
    }
    function getPasswordDosNotMatch(){
        return $this->PasswordDosNotMatch;
    }
    function getRequiredConfirmPassword(){
        return $this->RequiredConfirmPassword;
    }
    function getInvalidConfirmPassword(){
        return $this->InvalidConfirmPassword;
    }
    function getRequiredKeyPassword(){
        return $this->RequiredKeyPassword;
    }
    function getInvalidKeyPassword(){
        return $this->InvalidKeyPassword;
    }
    function getLabelConfirmPassword(){
        return $this->LabelConfirmPassword;
    }
    function getHintConfirmPassword(){
        return $this->HintConfirmPassword;
    }
    function getLabelKeyPassword(){
        return $this->LabelKeyPassword;
    }
    function getHintKeyPassword(){
        return $this->HintKeyPassword;
    }
}
$view = new Register();
?>
<div class="container">
    <div class="register">
        <form id='register' method='POST' action="register.php">
            <?php include 'login_form.php'?>
            <div class="form-group">
                <label for="password_confirmation"><?php echo $view->getLabelConfirmPassword()?></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="<?php echo $view->getHintConfirmPassword()?>"
                title="<?php echo $view->getHintConfirmPassword()?>"
                oninput="handleInputPassConfirmPass(this, '<?php echo $view->getRequiredConfirmPassword()?>', '<?php echo $view->getInvalidConfirmPassword()?>', 'password')"
                oninvalid="handleInputPassConfirmPass(this, '<?php echo $view->getRequiredConfirmPassword()?>', '<?php echo $view->getInvalidConfirmPassword()?>', 'password')"
                minlength="8" 
                required>
            </div>
            <div class="form-group">
                <label for="codePassword"><?php echo $view->getLabelKeyPassword()?></label>
                <input type="password" class="form-control" id="codePassword" name="Key"
                placeholder="<?php echo $view->getHintKeyPassword()?>"
                title="<?php echo $view->getHintKeyPassword()?>"
                minlength="8" 
                required
                oninput="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')"
                oninvalid="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')">
            </div>
        </form>
        <?php include 'change_language_model.php';?>
    </div>

</div>
<script type="text/javascript">
function handleInputPassConfirmPass(event, req, inv, id){
    if (event.validity.valueMissing)
        event.setCustomValidity(req);
    else if (event.validity.tooShort)
        event.setCustomValidity(inv);
    else if(event.value === $('#'+id).val()){
        event.setCustomValidity('');
        $('#'+id)[0].setCustomValidity('');
    }
    else if($(event).attr('id') === 'password' && event.value !== $('#'+id).val() && $('#'+id).val().length >=8){
        event.setCustomValidity('');
        $('#'+id)[0].setCustomValidity('<?php echo $view->getPasswordDosNotMatch()?>');
    }
    else if(event.value !== $('#'+id).val() && $('#'+id).val().length >=8)
        event.setCustomValidity('<?php echo $view->getPasswordDosNotMatch()?>');
    else if($(event).attr('id') === 'password')
        event.setCustomValidity('');
}
</script>
</body>
</html>