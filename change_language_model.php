<?php
$title = $this->getModelTitle();
$button = $this->getModelButton();
$action = 'ChangeLangPost.php';
include('start_model.php');
echo '<input type="hidden" value="'.$this->getId().'" name="superId">
<input type="hidden" name="change_language" value="'.$this->getUrlName2().'">';
foreach ($this->getMyLanguage() as $key => $value)
    if($key === $this->getLanguage())
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
        if($('input[name="id"]:checked').val() !== '<?php echo $this->getLanguage()?>')
           $('.flexCheck').prop('checked', true);
   });
    $('input[name="id"]').on('change', function(){
        validForm('#createForm');
        if(this.value !== '<?php echo $this->getLanguage()?>')
            $('.flexCheck')[0].setCustomValidity('');
        else
            this.setCustomValidity('<?php echo $this->getChangeLang()?>');
    });
    $('#click_button').on('click', function(){
        if($('input[name="id"]:checked').val() === '<?php echo $this->getLanguage()?>')
            $('input[name="id"]:checked')[0].setCustomValidity('<?php echo $this->getChangeLang()?>');
    });
</script>
