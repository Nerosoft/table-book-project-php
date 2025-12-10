<?php
class MyLanguage
{
    private $name;
    function __construct($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }
    static function fromArray($obj) {
        $lang = array();
        foreach ($obj->getModel2()['AllNamesLanguage'] as $key=>$value)
            $lang[$key] =  new MyLanguage($value);
        return $lang;
    }
}
