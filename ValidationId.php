<?php
require 'MessageError.php';
class ValidationId extends MessageError{
    private $ToastMessage;
    function showSuccessMessage(){
        $this->getView()->showCustomeMessage(function(){
            $toast = $this->ToastMessage;
            include 'toast_message.php';
        });
    }
    function __construct($view, $toastMessage){
        parent::__construct($view);
        $this->ToastMessage = $this->getView()->getModelPage()[$toastMessage];
        if(!isset($_POST['id']) || $_POST['id'] === '')
            $this->setErrors($this->getView()->getModel2()[$this->getView()->getUrlName2()]['IdIsReq']);
        else if(
        $this->getView()->getSCRIPTFILENAME() === 'BranchChangePost' && $_POST['id'] !== $this->getView()->getFixedId() && !isset($this->getView()->getBranch()[$_POST['id']])||
        !isset($this->getView()->getBranch()[$_POST['id']]) && $this->getView()->getUrlName2() === 'Branches' &&  $this->getView()->getSCRIPTFILENAME() !== 'BranchChangePost'||
        !isset($this->getView()->getModel2()['MyFlexTables'][$_POST['id']]) && $this->getView()->getUrlName2() === 'Home'||
        $this->getView()->getSCRIPTFILENAME() === 'FlexTablesEditPost' && !isset($this->getView()->getObj()[$_GET['id']][$_POST['id']]) ||
        $this->getView()->getSCRIPTFILENAME() === 'FlexTablesDeletePost' && !isset($this->getView()->getObj()[$_GET['id']][$_POST['id']]) ||
        !isset($this->getView()->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getView()->getUrlName2() === 'ChangeLanguage'||
        !isset($this->getView()->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getView()->getUrlName2() === 'Login'||
        !isset($this->getView()->getModel2()['AllNamesLanguage'][$_POST['id']]) && $this->getView()->getUrlName2() === 'Register')
            $this->setErrors($this->getView()->getModel2()[$this->getView()->getUrlName2()]['IdIsInv']);
    }
}
