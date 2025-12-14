<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login.php");
    exit;
}
require 'page.php';
require 'MyLanguage.php';
class ChangeLanguage extends Page{
    private $model;
    private $NewLangNameRequired;
    private $NewLangNameInvalid;
    private $LabelNameLanguage;
    private $HintNewLangName;
    private $NameLangaue;
    private $allNames;
    private $ButtonChangeLanguageMessage;
    private $LabelChangeLanguageMessage;
    private $TitleChangeLanguageMessage;

    function getButtonChangeLanguageMessage(){
        return $this->ButtonChangeLanguageMessage;
    }
    function getLabelChangeLanguageMessage(){
        return $this->LabelChangeLanguageMessage;
    }
    function getTitleChangeLanguageMessage(){
        return $this->TitleChangeLanguageMessage;
    }
    function getallNames(){
        return $this->allNames;
    }
    function getNameLangaue(){
        return $this->NameLangaue;
    }
    function getHintNewLangName(){
        return $this->HintNewLangName;
    }
    function getLabelNameLanguage(){
        return $this->LabelNameLanguage;
    }
    function getNewLangNameRequired(){
        return $this->NewLangNameRequired;
    }
    function getNewLangNameInvalid(){
        return $this->NewLangNameInvalid;
    }
    function __construct(){
        $this->model = new ModelJson();
        $this->NewLangNameRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['NewLangNameRequired'];
        $this->NewLangNameInvalid = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['NewLangNameInvalid'];
        $this->allNames = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']]['AllNamesLanguage'];
        parent::__construct($this);
        $this->LabelNameLanguage = $this->getModel2()[$this->getUrlName2()]['LabelCreateLanguage'];
        $this->HintNewLangName = $this->getModel2()[$this->getUrlName2()]['HintNewLangName'];
        $this->NameLangaue = $this->getModel2()[$this->getUrlName2()]['NameLangaue'];
        $this->ButtonChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['ButtonChangeLanguageMessage'];
        $this->LabelChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['LabelChangeLanguageMessage'];
        $this->TitleChangeLanguageMessage = $this->getModel2()[$this->getUrlName2()]['TitleChangeLanguageMessage'];
        
    }
    function isValid(){
       if(!isset($_POST['lang_name']) || $_POST['lang_name'] === '')
            $this->setErrors($this->getNewLangNameRequired());
        else if(strlen($_POST['lang_name']) < 3)
            $this->setErrors($this->getNewLangNameInvalid());
        
        if($this->isEmptyErrors()){
            $newKey = isset($_POST['id'])? $_POST['id'] : $this->getModel()->getRandomId();
            $myData = $this->getModel()->getObj();
            foreach ($this->allNames as $key=>$value)
                $myData[$key]['AllNamesLanguage'][$newKey] = $_POST['lang_name'];
            if(!isset($_POST['id'])){
                $myData[$newKey] = $myData['MyLanguage'];
                $myData[$newKey]['AllNamesLanguage'] = $myData[$this->getLanguage()]['AllNamesLanguage'];
                if(isset($myData[$this->getLanguage()]['MyFlexTables']))
                    foreach ($myData[$this->getLanguage()]['MyFlexTables'] as $key => $value){ 
                        $myData[$newKey]['MyFlexTables'][$key] = $value;
                        $myData[$newKey][$key] = $myData[$this->getLanguage()][$key];   
                    }
            }
            $this->getModel()->saveModel($myData);
        }
    }
    function makeChangeLanguage(){
        $myData = $this->getModel()->getObj();
        $myData['Setting']['Language'] = $_POST['id'];
        $this->getModel()->saveModel($myData);
    }
    function makeDeleteItem(){
        $myData = $this->getModel()->getObj();
        unset($myData[$_POST['id']]);
        foreach ($this->allNames as $key=>$value)
            if($key !== $_POST['id'])
                unset($myData[$key]['AllNamesLanguage'][$_POST['id']]);
        $this->getModel()->saveModel($myData);
    }
    function getModel(){
        return $this->model;
    }
    function getModel2(){
        return $this->model->getInfo($this);
    }
    function getMyDataView(){
        return array_reverse(MyLanguage::fromArray($this));
    }
}
$view = new ChangeLanguage();
?>
</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            include('modal_change_language.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getNameLangaue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $index => $myObject) {
                        $image = $index === $view->getLanguage() ? 'lightbulb-fill.svg' : 'lightbulb.svg';
                        echo <<<HTML
                            <tr>
                                <td>$count</td>
                                <td>{$myObject->getName()}</td>
                                <td>
                        HTML;
                        $title = $view->getTitleChangeLanguageMessage();
                        $button = $view->getButtonChangeLanguageMessage();
                        $idModel = "selectLanguage".$index;
                        $idForm = "selectLanguage".$index;
                        include('start_model.php');
                        include('my_id.php');
                        echo '<input type="hidden" name="change_language">'.$view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
                        include('end_model.php');

                        if($index !== $view->getLanguage())
                            include('modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        include('modal_change_language.php');
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}')"/>
                                    <img class="style_icon_menu pointer" src="./asset/lib/icons/{$image}" onclick="openForm('#selectLanguage{$index}')"></i>
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
                <th><?php echo$view->getNameLangaue()?></th>
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
    function displayEditForm(id, value){
        removeClass(id);
        openForm(id);
        $(id).find('#lang_name').val(value);
    }
</script>
<?php include 'end_html.php'?>