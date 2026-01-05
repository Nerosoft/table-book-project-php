<?php
require 'MessageError.php';
class ValidationId extends MessageError{
    private $ToastMessage;
    function getToastMessage(){
        return $this->ToastMessage;
    }
    function __construct($IdPage, $toastMessage){
        parent::__construct($IdPage);
        $this->ToastMessage = $this->getModelPage()[$toastMessage];
        if(!isset($_POST['id']) || $_POST['id'] === '')
            $this->setErrors($this->getModel2()[$this->getUrlName2()]['IdIsReq']);
        else if(
        $this->getSCRIPTFILENAME() === 'BranchChangePost' && $_POST['id'] !== $this->getFixedId() && !isset($this->getBranch()[$_POST['id']])||
        !isset($this->getBranch()[$_POST['id']]) && $this->getUrlName2() === 'Branches' && $this->getSCRIPTFILENAME() !== 'BranchChangePost'||
        $this->getUrlName2() === 'Branches' && $_POST['id'] === $_SESSION['userId']&& $this->getSCRIPTFILENAME() !== 'BranchChangePost'||
        !isset($this->getModel2()['MyFlexTables'][$_POST['id']]) && $this->getUrlName2() === 'Home'||
        $this->getSCRIPTFILENAME() === 'FlexTablesEditPost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
        $this->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($this->getObj()[$_GET['id']][$_POST['id']]) ||
        !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'ChangeLanguage'||
        $_POST['id'] === $this->getLanguage() && $this->getUrlName2() === 'ChangeLanguage'||
        !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'Login'||
        !isset($this->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getUrlName2() === 'Register')
            $this->setErrors($this->getModel2()[$this->getUrlName2()]['IdIsInv']);
    }
}
