<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'ValidationId.php';
class BranchEditPost extends ValidationId{
    use ErrorBranch;
    function __construct(){
        parent::__construct('Branches', 'MessageModelEdit');
        $this->initErrorBranch($this->getModelPage());
        $this->ValidBranch($this);
        if($this->isEmptyErrors()){
            $file = $this->getFile();
            $keyId = $_POST['id'];
            unset($_POST['id']);
            $this->saveBranch($keyId, $file);
        }
    }
}

$view2 = new BranchEditPost();
$view = new MyBranch();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');