<?php
require 'MessageError.php';
class ValidationStaticId extends MessageError{
    function __construct($IdPage){
        parent::__construct($IdPage);
        if(!isset($_POST['superId']) || !isset($this->getFile()[$_POST['superId']])){
            $this->setErrors($this->getModelPage()['DbIdInv']);
        }
    }
}