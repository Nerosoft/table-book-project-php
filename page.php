<?php
require 'AdminMenu.php';
class Page extends AdminMenu{
    private $ScreenModelCreate;
    private $ButtonModelCreate;
    private $ButtonModelAdd;
    private $ScreenModelDelete;
    private $messageModelDelete;
    private $buttonModelDelete;
    private $LoadMessage;
    function __construct($obj){
        parent::__construct($obj);
        $this->ScreenModelCreate = $obj->getModel2()[$this->getUrlName2()]['ScreenModelCreate'];
        $this->ButtonModelCreate = $obj->getModel2()[$this->getUrlName2()]['ButtonModelCreate'];
        $this->ButtonModelAdd = $obj->getModel2()[$this->getUrlName2()]['ButtonModelAdd'];
        $this->ScreenModelDelete = $obj->getModel2()[$this->getUrlName2()]['ScreenModelDelete'];
        $this->messageModelDelete = $obj->getModel2()[$this->getUrlName2()]['MessageModelDelete'];
        $this->buttonModelDelete = $obj->getModel2()[$this->getUrlName2()]['ButtonModelDelete'];
    }
    function getScreenModelCreate(){
        return $this->ScreenModelCreate;
    }
    function getButtonModelCreate(){
        return $this->ButtonModelCreate;
    }
    function getButtonModelAdd(){
        return $this->ButtonModelAdd;
    }
    function getScreenModelDelete(){
        return $this->ScreenModelDelete;
    }
    function getmessageModelDelete(){
        return $this->messageModelDelete;
    }
    function getbuttonModelDelete(){
        return $this->buttonModelDelete;
    }
    function getLoadMessage(){
        return $this->LoadMessage;
    }
}