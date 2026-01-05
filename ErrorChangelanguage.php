<?php
trait ErrorChangelanguageAllNames{
    private $allNames;
    function initErrorChangelanguageAllNames($AllNamesLanguage){
        $this->allNames = $AllNamesLanguage;
    }
    function getallNames(){
        return $this->allNames;
    }
}
trait ErrorChangelanguage{
    use ErrorChangelanguageAllNames;
    private $NewLangNameRequired;
    private $NewLangNameInvalid;
    function initErrorChangelanguage($info){
        $this->NewLangNameRequired = $info['ChangeLanguage']['NewLangNameRequired'];
        $this->NewLangNameInvalid = $info['ChangeLanguage']['NewLangNameInvalid'];
        $this->initErrorChangelanguageAllNames($info['AllNamesLanguage']);
    }
    function getNewLangNameRequired(){
        return $this->NewLangNameRequired;
    }
    function getNewLangNameInvalid(){
        return $this->NewLangNameInvalid;
    }

}
