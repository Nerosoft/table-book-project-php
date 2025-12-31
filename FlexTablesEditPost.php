<?php
include 'SessionAdmin.php';
require 'ValidationId.php';
require 'MyFlexTablesView.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['userId']) && isset($_SESSION['staticId'])){
class FlexTablesEditPost extends ValidationId{
    function __construct(){
        parent::__construct(new MyFlexTablesView(), 'MessageModelEdit');
        $this->validFlexTable();
        if($this->isEmptyErrors())
            $this->saveFlexDataBase($_POST['id']);
    }
}
$view2 = new FlexTablesEditPost();
$view = $view2->getView();
include 'FlexTables_view.php';
}else
    header('LOCATION:Home');