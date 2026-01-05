<?php
include 'SessionAdmin.php';
require 'MyChangeLanguage.php';
require 'MessageError.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class ChangeLanguageCreatePost extends MessageError{
    use ErrorChangelanguage;
    private $ToastMessage;
    function getToastMessage(){
        return $this->ToastMessage;
    }
    function __construct(){
        parent::__construct('ChangeLanguage');
        $this->initErrorChangelanguage($this->getModel2());
        $this->ToastMessage = $this->getModelPage()['MessageModelCreate'];
        $this->validChangeLanguage($this);
        if($this->isEmptyErrors()){
            $newKey = $this->getRandomId();
            $myData = $this->getObj();
            $this->saveLanguageDatabase($newKey, $myData, $this);
            $myData[$newKey] = $myData['MyLanguage'];
            $myData[$newKey]['AllNamesLanguage'] = $myData[$this->getLanguage()]['AllNamesLanguage'];
            if(isset($myData[$this->getLanguage()]['MyFlexTables']))
                foreach ($myData[$this->getLanguage()]['MyFlexTables'] as $key => $value){ 
                    $myData[$newKey]['MyFlexTables'][$key] = $value;
                    $myData[$newKey][$key] = $myData[$this->getLanguage()][$key];   
                }  
            $this->saveModel($myData);
        }
    }
}

$view2 = new ChangeLanguageCreatePost();
$view = new MyChangeLanguage();
include 'ChangeLanguage_view.php';
}else
    header('LOCATION:ChangeLanguage');