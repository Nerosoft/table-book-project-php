<?php
include 'SessionAdmin.php';
require 'MessageError.php';
require 'MyBranch.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class BranchCreatePost extends MessageError{
    function showSuccessMessage(){
        $this->getView()->showCustomeMessage(function(){
            $toast = $this->getView()->getModelPage()['MessageModelCreate'];
            include 'toast_message.php';
        });
    }
    function __construct(){
        parent::__construct(new MyBranch());
        $this->ValidBranch();
        if($this->isEmptyErrors()){
            $file = $this->getView()->getFile();
            $keyId = $this->getRandomId();
            $obj = $this->getView()->getFileByFixedId();
            unset($obj['Branches'], $obj['Users']);
            $file [$keyId] = $obj;
            $file[$this->getView()->getFixedId()]['Branches'][$keyId] = $_POST;
            $this->getView()->saveFile($file);
        }
    }
}

$view2 = new BranchCreatePost();
$view = $view2->getView();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');