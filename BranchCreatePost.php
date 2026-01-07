<?php
include 'SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
require 'MyBranch.php';
require 'MessageError.php';
class BranchCreatePost extends MessageError{
    use ErrorBranch;
    private $ToastMessage;
    function getToastMessage(){
        return $this->ToastMessage;
    }
    function __construct(){
        parent::__construct('Branches');
        $this->ToastMessage = $this->getModelPage()['MessageModelCreate'];
        $this->initErrorBranch($this->getModelPage());
        $this->ValidBranch($this);
        if($this->isEmptyErrors()){
            $file = $this->getFile();
            $keyId = $this->getRandomId();
            $obj = $this->getFileByFixedId();
            unset($obj['Branches'], $obj['Users']);
            $file [$keyId] = $obj;
            $this->saveBranch($keyId, $file);
        }
    }
}

$view2 = new BranchCreatePost();
$view = new MyBranch();
include 'Branch_view.php';
}else
    header('LOCATION:Branches');