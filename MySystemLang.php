<?php
require 'AdminMenu.php';
require 'ErrorSystemlang.php';
class MySystemlang extends AdminMenu{
    use ErrorSystemlang;
    private $LanguageName;
    private $LanguageValue;
    private $Text;
    private $WordHint;
    private $DataView;
    function getLanguageName(){
        return $this->LanguageName;
    }
    function getLanguageValue(){
        return $this->LanguageValue;
    }
    function getText(){
        return $this->Text;
    }
    function getWordHint(){
        return $this->WordHint;
    }
    function __construct(){
        parent::__construct('SystemLang');
        $this->initErrorSystemlang($this->getModelPage());
        $this->LanguageName = $this->getModel2()[$this->getUrlName2()]['LanguageName'];
        $this->LanguageValue = $this->getModel2()[$this->getUrlName2()]['LanguageValue'];
        $this->Text = $this->getModel2()[$this->getUrlName2()]['Text'];
        $this->WordHint = $this->getModel2()[$this->getUrlName2()]['WordHint'];
        if(isset($_GET['lang']) && isset($_GET['table']) && isset($this->getObj()[$_GET['lang']][$_GET['table']]))
            $this->DataView = $this->getObj()[$_GET['lang']][$_GET['table']];
        else if(!(isset($_GET['lang']) && isset($_GET['table']))){
            $tableData = array();
            foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                $tableData[$key] = $this->getObj()[$key];
            $this->DataView = $tableData;
        }
        else
            $this->DataView = array();
    }
    function getMyDataView(){
        return $this->DataView;
    }
}