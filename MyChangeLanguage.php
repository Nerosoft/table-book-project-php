<?php
require 'page.php';
require 'MyLanguage.php';
class MyChangeLanguage extends Page{
    private $NewLangNameRequired;
    private $NewLangNameInvalid;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    private $allNames;
    private $ButtonChangeLanguageMessage;
    private $LabelChangeLanguageMessage;
    private $TitleChangeLanguageMessage;

    function getButtonChangeLanguageMessage(){
        return $this->ButtonChangeLanguageMessage;
    }
    function getLabelChangeLanguageMessage(){
        return $this->LabelChangeLanguageMessage;
    }
    function getTitleChangeLanguageMessage(){
        return $this->TitleChangeLanguageMessage;
    }
    function getallNames(){
        return $this->allNames;
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
    function getNewLangNameRequired(){
        return $this->NewLangNameRequired;
    }
    function getNewLangNameInvalid(){
        return $this->NewLangNameInvalid;
    }
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->NewLangNameRequired = $this->getModel2()[$this->getUrlName2()]['NewLangNameRequired'];
        $this->NewLangNameInvalid = $this->getModel2()[$this->getUrlName2()]['NewLangNameInvalid'];
        $this->allNames = $this->getModel2()['AllNamesLanguage'];
        $this->LabelNameLanguage = $this->getModel2()[$this->getUrlName2()]['LabelCreateLanguage'];
        $this->HintNewLangName = $this->getModel2()[$this->getUrlName2()]['HintNewLangName'];
        $this->NameLangaue = $this->getModel2()[$this->getUrlName2()]['NameLangaue'];
        $this->ButtonChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['ButtonChangeLanguageMessage'];
        $this->LabelChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['LabelChangeLanguageMessage'];
        $this->TitleChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['TitleChangeLanguageMessage'];
        
    }
    function getMyDataView(){
        return array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
    }
}