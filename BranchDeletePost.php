<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyBranch.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class BranchDeletePost extends ValidationId{
    function __construct(){
        parent::__construct(new MyBranch(), 'Delete');
        if($this->isEmptyErrors()){
            $file = $this->getView()->getFile();
            if(count($file[$this->getView()->getFixedId()]['Branches']) === 1)
                unset($file[$this->getView()->getFixedId()]['Branches']);
            else
                unset( $file[$this->getView()->getFixedId()]['Branches'][$_POST['id']]);
            unset($file[$_POST['id']]);
            $this->getView()->saveFile($file);
        }
    }
}

$view2 = new BranchDeletePost();
$view = $view2->getView();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');