<?php
require 'ModelJson.php';
class InformationPage{
    private $Title;
    private $Language;
    private $Errors = array();
    function setErrors($error){
        array_push($this->Errors, $error);
    }
    function getErrors(){
        return $this->Errors;
    }
    function isEmptyErrors(){
        return empty($this->Errors);
    }
    function __construct($language, $obj = null){
        if(is_null($obj))
            $this->Language = $language;
        else{
            $this->Language = $language;
            $this->Title = $obj->getModel2()[$this->getUrlName2()]['Title'];
        }
    }
    function getTitle(){
        return $this->Title;
    }
    function getLanguage(){
        return $this->Language;
    }
    function setLanguage($lang){
        $this->Language = $lang;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
    function showCustomeMessage($callback){
        echo'<div style="position: fixed; top: 0px; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">';
        $callback();
        echo'</div>';
    }
    function getUrlName2(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'] === 'MyFlexTables'?$_GET['id']:pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
    function getSCRIPTFILENAME(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
}