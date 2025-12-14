<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login.php");
    exit;
}
require 'page.php';
class Flextable extends Page{
    private $model;
    private $ErrorsMessageReq;
    private $ErrorsMessageInv;
    private $TableHead;
    private $Label;
    private $Hint;
    function __construct(){
        //solve get id
        $this->model = new ModelJson();
        if(!isset($this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$_GET['id']]))
            header("Location: home.php");
        $this->ErrorsMessageReq = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$_GET['id']]['ErrorsMessageReq'];
        $this->ErrorsMessageInv = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$_GET['id']]['ErrorsMessageInv'];
        parent::__construct($this);
        $this->TableHead = $this->getModel2()[$_GET['id']]['TableHead'];
        $this->Label = $this->getModel2()[$_GET['id']]['Label'];
        $this->Hint = $this->getModel2()[$_GET['id']]['Hint'];
    }
    function isValid(){
        foreach ($this->getErrorsMessageReq() as $key => $value) {
            if(!isset($_POST[$key]) || $_POST[$key] === '')
                $this->setErrors($this->getErrorsMessageReq()[$key]);
            else if(strlen($_POST[$key]) < 3)
                $this->setErrors($this->getErrorsMessageInv()[$key]);
        }
        
        if($this->isEmptyErrors()){
            $myData = $this->getModel()->getObj();
            $keyId = isset($_POST['id']) ? $_POST['id'] : $this->getModel()->getRandomId();
            foreach ($this->getErrorsMessageReq() as $key => $value)
                $myData[$_GET['id']][$keyId][$key] = $_POST[$key];
            $this->getModel()->saveModel($myData);
        }
    }
    function makeDeleteItem(){
        $myData = $this->getModel()->getObj();
        if(count($myData[$_GET['id']]) === 1)
            unset($myData[$_GET['id']]);
        else
            unset($myData[$_GET['id']][$_POST['id']]);
        $this->getModel()->saveModel($myData);
    }
    function getModel(){
        return $this->model;
    }
    function getModel2(){
        return $this->model->getInfo($this);
    }
    function getMyDataView(){
        return isset($this->getModel()->getObj()[$_GET['id']])?array_reverse($this->getModel()->getObj()[$_GET['id']]):array();
    }
    function getErrorsMessageReq(){
        return $this->ErrorsMessageReq;
    }
    function getErrorsMessageInv(){
        return $this->ErrorsMessageInv;
    }
    function getTableHead(){
        return $this->TableHead;
    }
    function getLabel(){
        return $this->Label;
    }
    function getHint(){
        return $this->Hint;
    }
}
$view = new Flextable();
?>
</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            include('modal_flex.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <?php 
                    foreach($view->getTableHead() as $index=>$name)
                        echo<<<HTML
                            <th>{$name}</th>
                            HTML;
                ?>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $index => $myObject) {
                        echo <<<HTML
                            <tr>
                                <td>$count</td>
                        HTML;
                        foreach ($myObject as $key => $item)
                            echo <<<HTML
                            <td>{$item}</td>
                            HTML;  
                        echo <<<HTML
                            <td>
                            HTML;
                        $nameItem = $myObject[array_key_first($myObject)];
                        include('modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        include('modal_flex.php');
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm('#{$idModel}', '{$index}') "/>
                                </td>
                            </tr>
                        HTML;
                        ++$count;
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <?php 
                    foreach($view->getTableHead() as $index=>$name)
                        echo<<<HTML
                            <th>{$name}</th>
                            HTML;
                ?>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [{ 'searchable': true, className: "text-left" }];
    for (let index = 0; index < <?php echo count($view->getTableHead())?>; index++)
        setting.push({ 'searchable': true, className: "text-left" });
    setting.push({ 'searchable': false, className: "text-left" });
    function displayEditForm(id, keyObj){
        removeClass(id);
        openForm(id);
        let myObj = <?php echo json_encode($view->getMyDataView())?>;
        for (const key in myObj[keyObj]) 
            $(id).find('#'+key).val(myObj[keyObj][key]);
    }
</script>
<?php include 'end_html.php'?>