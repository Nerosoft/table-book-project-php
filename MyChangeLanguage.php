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
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('ChangeLanguage', $message, $type);
        $this->initErrorChangelanguage($this->getModel2());
        $this->LabelNameLanguage = $this->getModelPage()['LabelCreateLanguage'];
        $this->HintNewLangName = $this->getModelPage()['HintNewLangName'];
        $this->NameLangaue = $this->getModelPage()['NameLangaue'];
        $this->ButtonChangeLanguageMessage = $this->getModelPage()['ButtonChangeLanguageMessage'];
        $this->LabelChangeLanguageMessage = $this->getModelPage()['LabelChangeLanguageMessage'];
        $this->TitleChangeLanguageMessage = $this->getModelPage()['TitleChangeLanguageMessage'];
        $this->DataView =  array_reverse(MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
    }
    function getMyDataView(){
        return $this->DataView;
    }
}