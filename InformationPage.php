<?php
require 'ModelJson.php';
class InformationPage extends ModelJson{
    private $Title;
    private $Language;
    private $IdPage;
    function getModel2(){
        return $this->getObj()[$this->getLanguage()];
    }
    function getModelPage(){
        return $this->getObj()[$this->getLanguage()][$this->getUrlName2()];
    }
    function __construct($IdPage){
        $this->IdPage = $IdPage;
        parent::__construct();
        $this->Language = isset($_COOKIE[$this->getId()]) && isset($this->getObj()[$_COOKIE[$this->getId()]]) && $this->getUrlName2() === 'Login' || isset($_COOKIE[$this->getId()]) && isset($this->getObj()[$_COOKIE[$this->getId()]]) && $this->getUrlName2() === 'Register'?$_COOKIE[$this->getId()]:$this->getObj()['Setting']['Language'];
        $this->Title = $this->getModel2()[$this->getUrlName2()]['Title'];
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
        return $this->IdPage;
    }
    function getSCRIPTFILENAME(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
}