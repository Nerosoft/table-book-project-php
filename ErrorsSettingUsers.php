<?php
require 'ErrorsEmailPassword.php';
require 'ErrorsKeyPassword.php';
trait ErrorsSettingUsers{
    use ErrorsEmailPassword, ErrorsKeyPassword;
    function initErrorsSettingUsers($error){
        $this->initErrorsEmailPassword($error);
        $this->initErrorsKeyPassword($error);
    }
}