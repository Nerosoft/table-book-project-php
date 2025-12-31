<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyBranch.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class BranchEditPost extends ValidationId{
    function __construct(){
        parent::__construct(new MyBranch(), 'MessageModelEdit');
        $this->ValidBranch();
        if($this->isEmptyErrors()){
            $file = $this->getView()->getFile();
            $keyId = $_POST['id'];
            unset($_POST['id']);
            $file[$this->getView()->getFixedId()]['Branches'][$keyId] = $_POST;
            $this->getView()->saveFile($file);
        }
    }
}

$view2 = new BranchEditPost();
$view = $view2->getView();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');