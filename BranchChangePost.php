<?php
include 'SessionAdmin.php';
require 'MyBranch.php';
require 'ValidationId.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
class BranchChangePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches', 'SuccessfullyChangeBranch');
        if($this->isEmptyErrors())
            $this->resetId();
    }
}
$view2 = new BranchChangePost();
$view = new MyBranch();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');