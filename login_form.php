<?php include 'my_id2.php'?>
<h4><?php echo $view->getTitleForm()?></h4>
<div class="form-group">
    <label for="email"><?php echo $view->getLabelEmail()?></label>
    <input type="email" class="form-control" id="email" name="Email"
        value="<?php echo $_POST['Email']??''?>" placeholder="<?php echo $view->getHintEmail()?>"
        title="<?php echo $view->getHintEmail()?>"
        required>
</div>
<div class="form-group">
    <label for="password"><?php echo $view->getLabelPassword()?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $view->getHintPassword()?>"
        title="<?php echo $view->getHintPassword()?>"
        required
        minlength="8" 
        <?php 
            echo $view->getUrlName2() === 'Login'?<<<HTML
            oninput="handleInput(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}')"
            oninvalid="handleInput(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}')"
            HTML:
            <<<HTML
            oninput="handleInputPassConfirmPass(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}', 'password_confirmation')"
            oninvalid="handleInputPassConfirmPass(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}', 'password_confirmation')"
            HTML;
        ?>
        >
</div>
<script type="text/javascript">
    $('#email').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo $view->getRequiredEmail()?>');
        else if (this.validity.typeMismatch)
            this.setCustomValidity('<?php echo $view->getInvalidEmail()?>');
        else
            this.setCustomValidity('');
    });
</script>