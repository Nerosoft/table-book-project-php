<?php
include 'SessionAdmin.php';
require 'MessageError.php';
require 'MyFlexTablesView.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class FlexTablesCreatePost extends MessageError{
    function showSuccessMessage(){
        $this->getView()->showCustomeMessage(function(){
            $toast = $this->getView()->getModelPage()['MessageModelCreate'];
            include 'toast_message.php';
        });
    }
    function __construct(){
        parent::__construct(new MyFlexTablesView());
        $this->validFlexTable();
        if($this->isEmptyErrors())
            $this->saveFlexDataBase($this->getRandomId());
    }
}
$view2 = new FlexTablesCreatePost();
$view = $view2->getView();
include 'FlexTables_view.php';
}else
    header('LOCATION:Home');