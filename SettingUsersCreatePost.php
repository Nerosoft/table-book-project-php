<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'MessageError.php';
class SettingUsersCreatePost extends MessageError{
    use ErrorsEmailPassword, ErrorsKeyPassword;
    function __construct(){
        parent::__construct('SettingUsers');
        $this->initErrorsEmailPassword($this->getModelPage());
        $this->initErrorsKeyPassword($this->getModelPage());
        $this->validUsers();
        if($this->isEmptyErrors()){
            $this->saveUsers($this->getRandomId());
            $view = new MySettingUsers('MessageModelCreate');
            include 'SettingUsers_view.php';
        }else{
            $view = new MySettingUsers();
            $this->displayErrors();
            include 'SettingUsers_view.php';
        }
    }
}

new SettingUsersCreatePost();
}else
    header('LOCATION:SettingUsers.php');