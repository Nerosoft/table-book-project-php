<?php
require 'page.php';
require 'MyLanguage.php';
require 'ErrorChangelanguage.php';
class MyChangeLanguage extends Page{
    use ErrorChangelanguage;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    private $ButtonChangeLanguageMessage;
    private $LabelChangeLanguageMessage;
    private $TitleChangeLanguageMessage;
    private $DataView;

    function getButtonChangeLanguageMessage(){
        return $this->ButtonChangeLanguageMessage;
    }
    function getLabelChangeLanguageMessage(){
        return $this->LabelChangeLanguageMessage;
    }
    function getTitleChangeLanguageMessage(){
        return $this->TitleChangeLanguageMessage;
    }
    function getNameLangaue(){
        return $this->NameLangaue;
    }
    function getHintNewLangName(){
        return $this->HintNewLangName;
    }
    function getLabelNameLanguage(){
        return $this->LabelNameLanguage;
    }
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->initErrorChangelanguage($this->getModel2());
        $this->LabelNameLanguage = $this->getModel2()[$this->getUrlName2()]['LabelCreateLanguage'];
        $this->HintNewLangName = $this->getModel2()[$this->getUrlName2()]['HintNewLangName'];
        $this->NameLangaue = $this->getModel2()[$this->getUrlName2()]['NameLangaue'];
        $this->ButtonChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['ButtonChangeLanguageMessage'];
        $this->LabelChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['LabelChangeLanguageMessage'];
        $this->TitleChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['TitleChangeLanguageMessage'];
        $this->DataView =  array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
    }
    function getMyDataView(){
        return $this->DataView;
    }
}