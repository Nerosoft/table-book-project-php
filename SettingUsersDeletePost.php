<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MySettingUsers.php';
require 'ValidationId.php';
class SettingUsersDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('SettingUsers');
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            if(count($myData['Users']) === 1)
                unset($myData['Users']);
            else
                unset($myData['Users'][$_POST['id']]);
            $this->saveModel($myData);
            $view = new MySettingUsers('Delete');
            include 'SettingUsers_view.php';
        }else{
            $view = new MySettingUsers();
            $this->displayErrors();
            include 'SettingUsers_view.php';
        }
    }
}

new SettingUsersDeletePost();
}else
    header('LOCATION:SettingUsers.php');