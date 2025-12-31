<button form='register' type='submit' class="btn btn-primary" onclick="validForm('#register')"><?php echo $view->getButtonName()?></button>
<button type="button" onclick="openForm('#createModel')" class="btn btn-success"><?php echo $view->getChangeLanguageButton()?></button>
<?php
$title = $view->getModelTitle();
$button = $view->getModelButton();
$action = 'ChangeLangPost.php';
include('start_model.php');
include 'my_id2.php';
echo '<input type="hidden" name="change_language" value="'.$view->getUrlName2().'">';
foreach ($view->getMyLanguage() as $key => $value)
    if($key === $view->getLanguage())
        echo <<<HTML
            <div class="form-check">
            <input name="id" class="form-check-input flexCheck" value="{$key}" checked type="radio">
            <label  class="form-check-label">
            {$value->getName()}
            </label>
            </div>
        HTML;
    else
        echo <<<HTML
            <div class="form-check">
            <input name="id" class="form-check-input" value="{$key}" type="radio">
            <label  class="form-check-label">
            {$value->getName()}
            </label>
            </div>
        HTML;
include('end_model.php');
?>

              
                
<script type="text/javascript">
   $('#close_button').on('click', function() {
        removeClass('#createModel');
        if($('input[name="id"]:checked').val() !== '<?php echo $view->getLanguage()?>')
           $('.flexCheck').prop('checked', true);
   });
    $('input[name="id"]').on('change', function(){
        validForm('#createForm');
        if(this.value !== '<?php echo $view->getLanguage()?>')
            $('.flexCheck')[0].setCustomValidity('');
        else
            this.setCustomValidity('<?php echo $view->getChangeLang()?>');
    });
    $('#click_button').on('click', function(){
        if($('input[name="id"]:checked').val() === '<?php echo $view->getLanguage()?>')
            $('input[name="id"]:checked')[0].setCustomValidity('<?php echo $view->getChangeLang()?>');
    });
</script>
