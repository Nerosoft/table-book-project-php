<?php
require 'AdminMenu.php';
class MySystemlang extends AdminMenu{
    private $LanguageName;
    private $LanguageValue;
    private $TextRequired;
    private $TextLenght;
    private $Text;
    private $WordHint;
    function getLanguageName(){
        return $this->LanguageName;
    }
    function getLanguageValue(){
        return $this->LanguageValue;
    }
    function getTextRequired(){
        return $this->TextRequired;
    }
    function getTextLenght(){
        return $this->TextLenght;
    }
    function getText(){
        return $this->Text;
    }
    function getWordHint(){
        return $this->WordHint;
    }
    function __construct(){
        parent::__construct('SystemLang');
        $this->TextRequired = $this->getModel2()[$this->getUrlName2()]['TextRequired'];
        $this->TextLenght = $this->getModel2()[$this->getUrlName2()]['TextLenght'];
        $this->LanguageName = $this->getModel2()[$this->getUrlName2()]['LanguageName'];
        $this->LanguageValue = $this->getModel2()[$this->getUrlName2()]['LanguageValue'];
        $this->Text = $this->getModel2()[$this->getUrlName2()]['Text'];
        $this->WordHint = $this->getModel2()[$this->getUrlName2()]['WordHint'];
    }
    function getMyDataView(){
        if(isset($_GET['lang']) && isset($_GET['table']) && isset($this->getObj()[$_GET['lang']][$_GET['table']]))
            return $this->getObj()[$_GET['lang']][$_GET['table']];
        else if(!(isset($_GET['lang']) && isset($_GET['table']))){
            $tableData = array();
            foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                $tableData[$key] = $this->getObj()[$key];
            return $tableData;
        }
        else
            return array();
    }
}