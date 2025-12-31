<?php
class ModelJson{
    private $File;
    private $id;
    private $FixedId;
    function __construct(){
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