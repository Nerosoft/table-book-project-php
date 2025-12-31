<?php

class MessageError{
    private $Errors = array();
    private $view;
    function __construct($view){
        $this->view = $view;
    }
    function setErrors($error){
        array_push($this->Errors, $error);
    }
    function getErrors(){
        return $this->Errors;
    }
    function isEmptyErrors(){
        return empty($this->Errors);
    }
    function getView(){
        return $this->view;
    }
    function getRandomId(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function displayErrors(){
        $this->getView()->showCustomeMessage(function($type = 'danger'){
            foreach ($this->getErrors() as $key => $toast)
                include 'toast_message.php'; 
        });
    }
    function validCustomTable(){
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $this->setErrors($this->getView()->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $this->setErrors($this->getView()->getNameTableIsInv());
    }
    function ValidBranch(){
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            $this->setErrors($this->getView()->getBranceRaysNameRequired());
        else if(strlen($_POST['Name']) < 3)
            $this->setErrors($this->getView()->getBranceRaysNameLength());
        if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            $this->setErrors($this->getView()->getBranceRaysPhoneRequired());
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            $this->setErrors($this->getView()->getBranceRaysPhoneLength());
        if(!isset($_POST['Country']) || $_POST['Country'] === '')
            $this->setErrors($this->getView()->getBranceRaysCountryRequired());
        else if(strlen($_POST['Country']) < 3)
            $this->setErrors($this->getView()->getBranceRaysCountryLength());
        if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            $this->setErrors($this->getView()->getBranceRaysGovernmentsRequired());
        else if(strlen($_POST['Governments']) < 3)
            $this->setErrors($this->getView()->getBranceRaysGovernmentsLength());
        if(!isset($_POST['City']) || $_POST['City'] === '')
            $this->setErrors($this->getView()->getBranceRaysCityRequired());
        else if(strlen($_POST['City']) < 3)
            $this->setErrors($this->getView()->getBranceRaysCityLength());
        if(!isset($_POST['Street']) || $_POST['Street'] === '')
            $this->setErrors($this->getView()->getBranceRaysStreetRequired());
        else if(strlen($_POST['Street']) < 3)
            $this->setErrors($this->getView()->getBranceRaysStreetLength());
        if(!isset($_POST['Building']) || $_POST['Building'] === '')
            $this->setErrors($this->getView()->getBranceRaysBuildingRequired());
        else if(strlen($_POST['Building']) < 3)
            $this->setErrors($this->getView()->getBranceRaysBuildingLength());
        if(!isset($_POST['Address']) || $_POST['Address'] === '')
            $this->setErrors($this->getView()->getBranceRaysAddressRequired());
        else if(strlen($_POST['Address']) < 3)
            $this->setErrors($this->getView()->getBranceRaysAddressLength());
        if(!isset($_POST['Follow']) || $_POST['Follow'] === '')
            $this->setErrors($this->getView()->getBranceRaysFollowRequired());
        else if(!isset($this->getView()->getModel2()['SelectBranchBox'][$_POST['Follow']]))
            $this->setErrors($this->getView()->getModel2()[$this->getView()->getUrlName2()]['BranceRaysFollowValue']);
    }
    function validChangeLanguage(){
        if(!isset($_POST['lang_name']) || $_POST['lang_name'] === '')
            $this->setErrors($this->getView()->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            $this->setErrors($this->getView()->getNewLangNameInvalid());
    }
    function validFlexTable(){
        foreach ($this->getView()->getErrorsMessageReq() as $key => $value) {
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                $this->getView()->setErrors($this->getView()->getErrorsMessageReq()[$key]);
            else if(strlen($_POST[$key]) < 3)
                $this->getView()->setErrors($this->getView()->getErrorsMessageInv()[$key]);
        }
    }
    function saveFlexDataBase($keyId){
        $myData = $this->getView()->getObj();
        foreach ($this->getView()->getErrorsMessageReq() as $key => $value)
            $myData[$_GET['id']][$keyId][$key] = $_POST[$key];
        $this->getView()->saveModel($myData);
    }
}