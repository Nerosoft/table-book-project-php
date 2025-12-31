<?php
require 'page.php';
require 'CustomTable.php';
class MyHome extends Page{
    private $ScreenModelCreate;
    private $ButtonModelCreate;
    private $ScreenModelEdit;
    private $ButtonModelEdit;
    private $TableName;
    private $LabelName;
    private $HintName;
    private $LabelInputNumber;
    private $HintInputNumber;
    private $NameTableIsReq;
    private $NameTableIsInv;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function __construct(){
        parent::__construct('Home');
        $this->NameTableIsReq = $this->getObj()[$this->getObj()['Setting']['Language']][$this->getUrlName2()]['NameTableIsReq'];
        $this->NameTableIsInv = $this->getObj()[$this->getObj()['Setting']['Language']][$this->getUrlName2()]['NameTableIsInv'];
        $this->InputNumberTableIsReq = $this->getObj()[$this->getObj()['Setting']['Language']][$this->getUrlName2()]['InputNumberTableIsReq'];
        $this->InputNumberTableIsInv = $this->getObj()[$this->getObj()['Setting']['Language']][$this->getUrlName2()]['InputNumberTableIsInv']; 
        $this->TableName = $this->getModel2()[$this->getUrlName2()]['NameTable'];
        $this->LabelName = $this->getModel2()[$this->getUrlName2()]['LabelName'];
        $this->HintName = $this->getModel2()[$this->getUrlName2()]['HintName'];
        $this->LabelInputNumber = $this->getModel2()[$this->getUrlName2()]['LabelInputNumber'];
        $this->HintInputNumber = $this->getModel2()[$this->getUrlName2()]['HintInputNumber'];
    }
    function getMyDataView(){
        return isset($this->getModel2()['MyFlexTables'])?array_reverse(CustomTable::fromArray($this)):array();
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
    function getNameTableIsReq(){
        return $this->NameTableIsReq;
    }
    function getNameTableIsInv(){
        return $this->NameTableIsInv;
    }
    function getInputNumberTableIsReq(){
        return $this->InputNumberTableIsReq;
    }
    function getInputNumberTableIsInv(){
        return $this->InputNumberTableIsInv;
    }
}