<div class="container">
    <div class="register">
        <form id='register' method='POST' action="LoginPost.php">
            <?php include 'login_form.php'?>
        </form>
        <?php include 'buttons.php'?>
        <!-- Modal -->
        <?php 
        $title = $view->getModalForgetPasswordTitle();
        $button = $view->getModalForgetPasswordButton();
        $action = 'LoginForgetPasswordPost.php';
        $idModel = "forgetpasswordmodal";
        $idForm = "forgetpasswordform";
        include('start_model.php');
        echo '<input type="hidden" value="'.$view->getId().'"name="superId">';?>
        <div class="form-group">
            <label for="email"><?php echo $view->getLabelEmail()?></label>
            <input type="email" class="form-control" id="email" name="Email"
                placeholder="<?php echo $view->getHintEmail()?>"
                title="<?php echo $view->getHintEmail()?>"
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
        <?php include('end_model.php');?>
        <button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-primary" ><?php echo $view->getButtonForgetPassword()?></button>
        <?php 
        $title = $view->getModalTitleProject();
        $button = $view->getModalButtonProject();
        $action = 'SetupProject.php';
        $idModel = "setupprojectmodal";
        $idForm = "setupprojectform";
        include('start_model.php');
        echo '<input type="hidden" value="'.$view->getId().'"name="superId">
        <input type="hidden" name="setup_project" value="'.$view->getUrlName2().'">'?>
        <div class="form-group">
            <label for="email"><?php echo $view->getNameLabel()?></label>
            <input type="text" class="form-control" id="email" name="name"
                placeholder="<?php echo $view->getNameHint()?>"
                title="<?php echo $view->getNameHint()?>"
                oninvalid="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
                oninput="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
                minlength="3"
                required>
        </div>
        <?php include('end_model.php');?>
    </div>
</div>
</body>
</html>