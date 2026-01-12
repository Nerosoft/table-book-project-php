<div class="container">
    <div class="register">
        <form id='register' method='POST' action="LoginPost.php">
            <?php include 'login_form.php'?>
        </form>
        <?php include 'buttons.php'?>
        <button type="button" class="btn btn-primary" ><?php echo $view->getButtonForgetPassword()?></button>
    </div>
</div>
</body>
</html>