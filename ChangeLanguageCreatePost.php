<?php
include 'SessionAdmin.php';
require 'MessageError.php';
require 'MyChangeLanguage.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class ChangeLanguageCreatePost extends MessageError{
    function showSuccessMessage(){
        $this->getView()->showCustomeMessage(function(){
            $toast = $this->getView()->getModelPage()['MessageModelCreate'];
            include 'toast_message.php';
        });
    }
    function __construct(){
        parent::__construct(new MyChangeLanguage());
        $this->validChangeLanguage();
        if($this->isEmptyErrors()){
            $newKey = $this->getRandomId();
            $myData = $this->getView()->getObj();
            foreach ($this->getView()->getallNames() as $key=>$value)
                $myData[$key]['AllNamesLanguage'][$newKey] = $_POST['lang_name'];
            $myData[$newKey] = $myData['MyLanguage'];
            $myData[$newKey]['AllNamesLanguage'] = $myData[$this->getView()->getLanguage()]['AllNamesLanguage'];
            if(isset($myData[$this->getView()->getLanguage()]['MyFlexTables']))
                foreach ($myData[$this->getView()->getLanguage()]['MyFlexTables'] as $key => $value){ 
                    $myData[$newKey]['MyFlexTables'][$key] = $value;
                    $myData[$newKey][$key] = $myData[$this->getView()->getLanguage()][$key];   
                }
            
            $this->getView()->saveModel($myData);
        }
    }
}

$view2 = new ChangeLanguageCreatePost();
$view = $view2->getView();
include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');