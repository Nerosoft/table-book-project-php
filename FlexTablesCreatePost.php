<?php
include 'SessionAdmin.php';
require 'MyFlexTablesView.php';
require 'MessageError.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
class FlexTablesCreatePost extends MessageError{
    use ErrorFlexTable;
    private $ToastMessage;
    function getToastMessage(){
        return $this->ToastMessage;
    }
    function __construct(){
        parent::__construct($_GET['id']);
        $this->initErrorFlexTable($this->getModelPage());
        $this->ToastMessage = $this->getModelPage()['MessageModelCreate'];
        $this->validFlexTable();
        if($this->isEmptyErrors())
            $this->saveFlexDataBase($this->getRandomId());
    }
}
$view2 = new FlexTablesCreatePost();
$view = new MyFlexTablesView();
include 'FlexTables_view.php';
}else
    header('LOCATION:Home');