<?php
class ModelJson{
    private $File;
    private $id;
    private $FixedId;
    private $IdPage;
    private $Language;

    function __construct($IdPage){
        $this->IdPage = $IdPage;
        $this->File = json_decode(file_get_contents('data.json'), true);
        if(isset($_SESSION['userId'])){
            $this->id = $_SESSION['userId'];
            $this->FixedId = $_SESSION['staticId'];
        }
        else if(isset($_GET['id']) && isset($this->File[$_GET['id']]))
            $this->id = $_GET['id'];
        else if(isset($_POST['superId']) && isset($this->File[$_POST['superId']]))
            $this->id = $_POST['superId'];
        else
            $this->id = 'admin';
        $this->Language = isset($_COOKIE[$this->getId()]) && isset($this->getObj()[$_COOKIE[$this->getId()]]) && $this->getUrlName2() === 'Login' || isset($_COOKIE[$this->getId()]) && isset($this->getObj()[$_COOKIE[$this->getId()]]) && $this->getUrlName2() === 'Register'?$_COOKIE[$this->getId()]:$this->getObj()['Setting']['Language'];
    }
    function getModel2(){
        return $this->getObj()[$this->getLanguage()];
    }
    function getModelPage(){
        return $this->getObj()[$this->getLanguage()][$this->getUrlName2()];
    }
    function setLanguage($lang){
        $this->Language = $lang;
    }
    function getLanguage(){
        return $this->Language;
    }
    function getUrlName2(){
        return $this->IdPage;
    }
    function getSCRIPTFILENAME(){
        return pathinfo($_SERVER['SCRIPT_FILENAME'])['filename'];
    }
    function showCustomeMessage($callback){
        echo'<div style="position: fixed; top: 0px; right: 10px; z-index: 9999; max-height: 90vh; overflow-y: auto;">';
        $callback();
        echo'</div>';
    }
    function getFile(){
        return $this->File;
    }
    function saveFile($file){
        $this->File = $file;
        file_put_contents("data.json", json_encode($file, JSON_PRETTY_PRINT));
    }
    function getObj(){
        return $this->File[$this->id];
    }
    function getBranch(){
        return $this->File[$this->FixedId]['Branches']??null;
    }
    function getFileByFixedId(){
        return $this->File[$this->FixedId];
    }
    function saveModel($data){
        $this->File[$this->id] = $data;
        file_put_contents("data.json", json_encode($this->File, JSON_PRETTY_PRINT));
    }
    function getFixedId(){
        return $this->FixedId;
    }
    function getId(){
        return $this->id;
    }
    function resetId(){
        $_SESSION['userId'] = $_POST['id'];
        $this->id = $_POST['id'];
    }
}