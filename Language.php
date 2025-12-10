<?php
class Language{
    private $LangName;
    function __construct($lang){
        $this->LangName = $lang;
    }
    function getLanguage(){
        return $this->LangName;
    }
    static function makeAllLanguage($allLang){
        $arr = array();
        foreach ($allLang as $key => $value)
            $arr[$key] = new Language($value);
        return $arr;
    }
}