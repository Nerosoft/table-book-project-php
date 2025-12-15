<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login.php");
    exit;
}
require 'page.php';
require 'CustomTable.php';
class Home extends Page{
    private $model;
    private $ScreenModelCreate;
    private $ButtonModelCreate;
    private $ScreenModelEdit;
    private $ButtonModelEdit;
    private $TableName;
    private $LabelName;
    private $HintName;
    private $LabelInputNumber;
    private $HintInputNumber;
    private $NameTableIsReq;
    private $NameTableIsInv;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function __construct(){
        $this->model = new ModelJson();
        $this->NameTableIsReq = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['NameTableIsReq'];
        $this->NameTableIsInv = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['NameTableIsInv'];
        $this->InputNumberTableIsReq = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['InputNumberTableIsReq'];
        $this->InputNumberTableIsInv = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['InputNumberTableIsInv'];
        parent::__construct($this);
        $this->ScreenModelCreate = $this->getModel2()[$this->getUrlName2()]['ScreenModelCreate'];
        $this->ButtonModelCreate = $this->getModel2()[$this->getUrlName2()]['ButtonModelCreate'];
        $this->ScreenModelEdit = $this->getModel2()[$this->getUrlName2()]['ScreenModelEdit'];
        $this->ButtonModelEdit = $this->getModel2()[$this->getUrlName2()]['ButtonModelEdit'];
        $this->TableName = $this->getModel2()[$this->getUrlName2()]['NameTable'];
        $this->LabelName = $this->getModel2()[$this->getUrlName2()]['LabelName'];
        $this->HintName = $this->getModel2()[$this->getUrlName2()]['HintName'];
        $this->LabelInputNumber = $this->getModel2()[$this->getUrlName2()]['LabelInputNumber'];
        $this->HintInputNumber = $this->getModel2()[$this->getUrlName2()]['HintInputNumber'];
    }
    function isValid(){
       if(!isset($_POST['name']) || $_POST['name'] === '')
            $this->setErrors($this->getNameTableIsReq());
        else if(strlen($_POST['name']) < 3)
            $this->setErrors($this->getNameTableIsInv());

        if($this->isEmptyErrors() && isset($_POST['id'])){
            $myData =  $this->getModel()->getObj();
            foreach ($this->getModel2()['AllNamesLanguage'] as $code => $value) 
                $myData[$code]['MyFlexTables'][$_POST['id']] = $_POST['name'];
            $this->getModel()->saveModel($myData);
        }
        else if(!isset($_POST['input_number']) || $_POST['input_number'] === '')
            $this->setErrors($this->getInputNumberTableIsReq());
        else if($_POST['input_number'] > 8)
            $this->setErrors($this->getInputNumberTableIsInv());
        else if($this->isEmptyErrors()){
            $key = $this->getModel()->getRandomId();
            $myData =  $this->getModel()->getObj();
            foreach ($this->getModel2()['AllNamesLanguage'] as $code => $value) {
                $myData[$code]['MyFlexTables'][$key] = $_POST['name'];
                $myData[$code][$key] = $myData[$code]['TablePage'];
                $myData[$code][$key]['MYTITLE'] = $_POST['name'];
                 for ($i=0; $i < $_POST['input_number']; $i++){
                    $myInputKey = $this->getModel()->getRandomId();
                    $myData[$code][$key]['TableHead'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputNameTable'];
                    $myData[$code][$key]['Label'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputLabel'];
                    $myData[$code][$key]['Hint'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputHint'];
                    $myData[$code][$key]['ErrorsMessageReq'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageReq'];
                    $myData[$code][$key]['ErrorsMessageInv'][$myInputKey] = $myData[$code]['AppSettingAdmin']['InputErrorsMessageInv'];
                }
            }
            $this->getModel()->saveModel($myData);
        }
    }
    function makeDeleteItem(){
        $myData =  $this->getModel()->getObj();
        foreach ($this->getModel2()['AllNamesLanguage'] as $key => $value) 
            if(count($myData[$key]['MyFlexTables']) === 1)
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables']);
            else
                unset($myData[$key][$_POST['id']], $myData[$key]['MyFlexTables'][$_POST['id']]);
        if(isset($myData[$_POST['id']]))
            unset($myData[$_POST['id']]);
        $this->getModel()->saveModel($myData);
    }
    function getModel(){
        return $this->model;
    }
    function getModel2(){
        return $this->model->getInfo($this);
    }
    function getMyDataView(){
        return isset($this->getModel2()['MyFlexTables'])?array_reverse(CustomTable::fromArray($this)):array();
    }
    function getScreenModelCreate(){
        return $this->ScreenModelCreate;
    }
    function getButtonModelCreate(){
        return $this->ButtonModelCreate;
    }
    function getScreenModelEdit(){
        return $this->ScreenModelEdit;
    }
    function getButtonModelEdit(){
        return $this->ButtonModelEdit;
    }
    function getTableName(){
        return $this->TableName;
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getLabelInputNumber(){
        return $this->LabelInputNumber;
    }
    function getHintInputNumber(){
        return $this->HintInputNumber;
    }
    function getNameTableIsReq(){
        return $this->NameTableIsReq;
    }
    function getNameTableIsInv(){
        return $this->NameTableIsInv;
    }
    function getInputNumberTableIsReq(){
        return $this->InputNumberTableIsReq;
    }
    function getInputNumberTableIsInv(){
        return $this->InputNumberTableIsInv;
    }
}
$view = new Home();
?>
</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            include('modal_custome_table.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getTableName()?></th>
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
                                <td>{$myObject->getName()}</td>
                                <td>
                        HTML;
                        include('modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        include('modal_custome_table.php');
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}')"/>
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
                <th><?php echo$view->getTableName()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
    function displayEditForm(id, name){
        removeClass(id);
        openForm(id);
        $(id).find('#name').val(name);
    }
    $('#input_number').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsReq()?>');
        else if (this.value < 1 || this.value > 8)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsInv()?>');
        else
            this.setCustomValidity('');
    });
</script>
<?php include 'end_html.php'?>