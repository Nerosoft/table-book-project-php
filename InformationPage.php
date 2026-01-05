<?php
require 'ModelJson.php';
class InformationPage extends ModelJson{
    private $Title;
    function __construct($IdPage){
        parent::__construct($IdPage);
        $this->Title = $this->getModelPage()['Title'];
    }
    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
}