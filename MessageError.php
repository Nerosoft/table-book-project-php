<?php

class MessageError extends ModelJson{
    private $Errors = array();
    function __construct($IdPage){
        parent::__construct($IdPage);
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
    function getRandomId(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2) . substr(uniqid(), -6);
    }
    function displayErrors(){
        $this->showCustomeMessage(function($type = 'danger'){
            foreach ($this->getErrors() as $key => $toast)
                include 'toast_message.php'; 
        });
    }
    function validCustomTable($obj){
        if(!isset($_POST['name']) || $_POST['name'] === '')
            $obj->setErrors($obj->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $obj->setErrors($obj->getNameTableIsInv());
    }
    function ValidBranch($obj){
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            $this->setErrors($obj->getBranceRaysNameRequired());
        else if(strlen($_POST['Name']) < 3)
            $this->setErrors($obj->getBranceRaysNameLength());
        if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            $this->setErrors($obj->getBranceRaysPhoneRequired());
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            $this->setErrors($obj->getBranceRaysPhoneLength());
        if(!isset($_POST['Country']) || $_POST['Country'] === '')
            $this->setErrors($obj->getBranceRaysCountryRequired());
        else if(strlen($_POST['Country']) < 3)
            $this->setErrors($obj->getBranceRaysCountryLength());
        if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            $this->setErrors($obj->getBranceRaysGovernmentsRequired());
        else if(strlen($_POST['Governments']) < 3)
            $this->setErrors($obj->getBranceRaysGovernmentsLength());
        if(!isset($_POST['City']) || $_POST['City'] === '')
            $this->setErrors($obj->getBranceRaysCityRequired());
        else if(strlen($_POST['City']) < 3)
            $this->setErrors($obj->getBranceRaysCityLength());
        if(!isset($_POST['Street']) || $_POST['Street'] === '')
            $this->setErrors($obj->getBranceRaysStreetRequired());
        else if(strlen($_POST['Street']) < 3)
            $this->setErrors($obj->getBranceRaysStreetLength());
        if(!isset($_POST['Building']) || $_POST['Building'] === '')
            $this->setErrors($obj->getBranceRaysBuildingRequired());
        else if(strlen($_POST['Building']) < 3)
            $this->setErrors($obj->getBranceRaysBuildingLength());
        if(!isset($_POST['Address']) || $_POST['Address'] === '')
            $this->setErrors($obj->getBranceRaysAddressRequired());
        else if(strlen($_POST['Address']) < 3)
            $this->setErrors($obj->getBranceRaysAddressLength());
        if(!isset($_POST['Follow']) || $_POST['Follow'] === '')
            $this->setErrors($obj->getBranceRaysFollowRequired());
        else if(!isset($this->getModel2()['SelectBranchBox'][$_POST['Follow']]))
            $this->setErrors($this->getModel2()[$this->getUrlName2()]['BranceRaysFollowValue']);
    }
    function validChangeLanguage($obj){
        if(!isset($_POST['lang_name']) || $_POST['lang_name'] === '')
            $this->setErrors($obj->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            $this->setErrors($obj->getNewLangNameInvalid());
    }
    function validFlexTable(){
        foreach ($this->getErrorsMessageReq() as $key => $value) {
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                $this->setErrors($this->getErrorsMessageReq()[$key]);
            else if(strlen($_POST[$key]) < 3)
                $this->setErrors($this->getErrorsMessageInv()[$key]);
        }
    }
    //------------------------------------------------------------------
    function saveFlexDataBase($keyId){
        $myData = $this->getObj();
        foreach ($this->getErrorsMessageReq() as $key => $value)
            $myData[$_GET['id']][$keyId][$key] = $_POST[$key];
        $this->saveModel($myData);
    }
    function saveBranch($keyId, $file){
        $file[$this->getFixedId()]['Branches'][$keyId] = $_POST;
        $this->saveFile($file);
    }
    function saveLanguageDatabase($newKey, &$myData, $obj){
        foreach ($obj->getallNames() as $key=>$value)
            $myData[$key]['AllNamesLanguage'][$newKey] = $_POST['lang_name'];
    }
}