<?php
require 'AdminMenu.php';
//make home index page
//dont save value = $_POST
class Page extends AdminMenu{
    private $ScreenModelCreate;
    private $ButtonModelCreate;
    private $ButtonModelAdd;
    private $ScreenModelDelete;
    private $messageModelDelete;
    private $buttonModelDelete;
    private $LoadMessage;
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->ScreenModelCreate = $this->getModel2()[$this->getUrlName2()]['ScreenModelCreate'];
        $this->ButtonModelCreate = $this->getModel2()[$this->getUrlName2()]['ButtonModelCreate'];
        $this->ButtonModelAdd = $this->getModel2()[$this->getUrlName2()]['ButtonModelAdd'];
        $this->ScreenModelDelete = $this->getModel2()[$this->getUrlName2()]['ScreenModelDelete'];
        $this->messageModelDelete = $this->getModel2()[$this->getUrlName2()]['MessageModelDelete'];
        $this->buttonModelDelete = $this->getModel2()[$this->getUrlName2()]['ButtonModelDelete'];
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