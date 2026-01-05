<?php
require 'page.php';
require 'CustomTable.php';
require 'ErrorsHome.php';
class MyHome extends Page{
    use ErrorsHome;
    private $ScreenModelCreate;
    private $ButtonModelCreate;
    private $ScreenModelEdit;
    private $ButtonModelEdit;
    private $TableName;
    private $LabelName;
    private $HintName;
    private $LabelInputNumber;
    private $HintInputNumber;
    private $DataView;
    function __construct(){
        parent::__construct('Home');
        $this->initErrorsHome($this->getModelPage());
        $this->TableName = $this->getModel2()[$this->getUrlName2()]['NameTable'];
        $this->LabelName = $this->getModel2()[$this->getUrlName2()]['LabelName'];
        $this->HintName = $this->getModel2()[$this->getUrlName2()]['HintName'];
        $this->LabelInputNumber = $this->getModel2()[$this->getUrlName2()]['LabelInputNumber'];
        $this->HintInputNumber = $this->getModel2()[$this->getUrlName2()]['HintInputNumber'];
        $this->DataView = isset($this->getModel2()['MyFlexTables'])?array_reverse(CustomTable::fromArray($this)):array();
    }
    function getMyDataView(){
        return $this->DataView;
    }
    function getTableName(){
        return $this->TableName;
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getLabelInputNumber(){
        return $this->LabelInputNumber;
    }
    function getHintInputNumber(){
        return $this->HintInputNumber;
    }
}