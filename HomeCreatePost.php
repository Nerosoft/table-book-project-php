<?php
include 'SessionAdmin.php';
require 'MessageError.php';
require 'MyHome.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class HomeCreatePost extends MessageError{
    function showSuccessMessage(){
        $this->getView()->showCustomeMessage(function(){
            $toast = $this->getView()->getModelPage()['MessageModelCreate'];
            include 'toast_message.php';
        });
    }
    function __construct(){
        parent::__construct(new MyHome());
        $this->validCustomTable();
        if(!isset($_POST['input_number']) || $_POST['input_number'] === '')
            $this->setErrors($this->getView()->getInputNumberTableIsReq());
        else if($_POST['input_number'] > 8)
            $this->setErrors($this->getView()->getInputNumberTableIsInv());
        else if($this->isEmptyErrors()){
            $key = $this->getRandomId();
            $myData = $this->getView()->getObj();
            foreach ($this->getView()->getModel2()['AllNamesLanguage'] as $code => $value) {
                $myData[$code]['MyFlexTables'][$key] = $_POST['name'];
                $myData[$code][$key] = $myData[$code]['TablePage'];
                $myData[$code][$key]['MYTITLE'] = $_POST['name'];
                 for ($i=0; $i < $_POST['input_number']; $i++){
                    $myInputKey = $this->getRandomId();
                    $myData[$code][$key]['TableHead'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputNameTable'];
                    $myData[$code][$key]['Label'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputLabel'];
                    $myData[$code][$key]['Hint'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputHint'];
                    $myData[$code][$key]['ErrorsMessageReq'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageReq'];
                    $myData[$code][$key]['ErrorsMessageInv'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageInv'];
                }
            }
            $this->getView()->saveModel($myData);
        }
    }
}

$view2 = new HomeCreatePost();
$view = $view2->getView();
include 'home_view.php';
}else
    header('LOCATION:Home');