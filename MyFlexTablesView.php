<?php
require 'page.php';
if(!isset((new ModelJson())->getObj()[(new ModelJson())->getObj()['Setting']['Language']][$_GET['id']]))
    header("Location: home.php");
class MyFlexTablesView extends Page{
    private $ErrorsMessageReq;
    private $ErrorsMessageInv;
    private $TableHead;
    private $Label;
    private $Hint;
    function __construct(){
        parent::__construct($_GET['id']);
        $this->ErrorsMessageReq = $this->getModelPage()['ErrorsMessageReq'];
        $this->ErrorsMessageInv = $this->getModelPage()['ErrorsMessageInv'];
        $this->TableHead = $this->getModelPage()['TableHead'];
        $this->Label = $this->getModelPage()['Label'];
        $this->Hint = $this->getModelPage()['Hint'];
    }
    function getMyDataView(){
        return isset($this->getObj()[$_GET['id']])?array_reverse($this->getObj()[$_GET['id']]):array();
    }
    function getErrorsMessageReq(){
        return $this->ErrorsMessageReq;
    }
    function getErrorsMessageInv(){
        return $this->ErrorsMessageInv;
    }
    function getTableHead(){
        return $this->TableHead;
    }
    function getLabel(){
        return $this->Label;
    }
    function getHint(){
        return $this->Hint;
    }
}