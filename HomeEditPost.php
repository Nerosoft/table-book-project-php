<?php
include 'SessionAdmin.php';
require 'MyHome.php';
require 'ValidationId.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['staticId'])){
class HomeEditPost extends ValidationId{
    use ErrorsHome;
    function __construct(){
        parent::__construct('Home', 'MessageModelEdit');
        $this->initErrorsHome($this->getModelPage());
        $this->validCustomTable($this);
        if($this->isEmptyErrors()){
            $myData = $this->getObj();
            foreach ($this->getModel2()['AllNamesLanguage'] as $code => $value) 
                $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
            $this->saveModel($myData);
        }
    }
}
$view2 = new HomeEditPost();
$view = new MyHome();
include 'home_view.php';
}else
    header('LOCATION:Home');