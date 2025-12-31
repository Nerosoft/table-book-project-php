<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyBranch.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct(new MyBranch(), 'SuccessfullyChangeBranch');
        if($this->isEmptyErrors()){
            $this->getView()->resetId();
            $this->getView()->setLanguage($this->getView()->getObj()['Setting']['Language']);
            $this->getView()->setTitle($this->getView()->getModelPage()['Title']);
        }
    }
}

$view2 = new BranchChangePost();
$view = $view2->getView();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');