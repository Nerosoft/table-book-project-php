<?php
include 'SessionAdmin.php';
require 'MyBranch.php';
require 'ValidationId.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class BranchDeletePost extends ValidationId{
    function __construct(){
        parent::__construct('Branches', 'Delete');
        if($this->isEmptyErrors()){
            $file = $this->getFile();
            if(count($file[$this->getFixedId()]['Branches']) === 1)
                unset($file[$this->getFixedId()]['Branches']);
            else
                unset( $file[$this->getFixedId()]['Branches'][$_POST['id']]);
            unset($file[$_POST['id']]);
            $this->saveFile($file);
        }
    }
}
$view2 = new BranchDeletePost();
$view = new MyBranch();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');