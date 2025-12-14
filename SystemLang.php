<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login.php");
    exit;
}
require 'AdminMenu.php';
class Systemlang extends AdminMenu{
    private $model;
    private $LanguageName;
    private $LanguageValue;
    private $TextRequired;
    private $TextLenght;
    private $Text;
    private $WordHint;
    function getLanguageName(){
        return $this->LanguageName;
    }
    function getLanguageValue(){
        return $this->LanguageValue;
    }
    function getTextRequired(){
        return $this->TextRequired;
    }
    function getTextLenght(){
        return $this->TextLenght;
    }
    function getText(){
        return $this->Text;
    }
    function getWordHint(){
        return $this->WordHint;
    }
    function __construct(){
        $this->model = new ModelJson();
        $this->TextRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['TextRequired'];
        $this->TextLenght = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['TextLenght'];
        parent::__construct($this);
        $this->LanguageName = $this->getModel2()[$this->getUrlName2()]['LanguageName'];
        $this->LanguageValue = $this->getModel2()[$this->getUrlName2()]['LanguageValue'];
        $this->Text = $this->getModel2()[$this->getUrlName2()]['Text'];
        $this->WordHint = $this->getModel2()[$this->getUrlName2()]['WordHint'];
    }
    function isValid(){
        if(!isset($_POST['word']) || $_POST['word'] === '')
            $this->setErrors($this->getTextRequired());
        else if(!isset($_GET['lang']) || !isset($_GET['table']) || !isset($_GET['key']) || strlen($_POST['word']) < 3 || !isset($this->getModel()->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']]) && !isset($_GET['array']) || isset($_GET['array']) && !isset($this->getModel()->getObj()[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']]))
            $this->setErrors($this->getTextLenght());
        $this->showCustomeMessage(function(){
            if($this->isEmptyErrors()){
                $toast = $this->getModel2()[$this->getUrlName2()]['AllLanguageEdit'];
                include 'toast_message.php';
                $file = $this->getModel()->getObj();
                if(isset($_GET['array']))
                    $file[$_GET['lang']][$_GET['table']][$_GET['key']][$_GET['array']] = $_POST['word'];
                else
                    $file[$_GET['lang']][$_GET['table']][$_GET['key']] = $_POST['word'];
                $this->getModel()->saveModel($file);
            }else{
                $type = 'danger';
                foreach ($this->getErrors() as $key => $toast)
                    include 'toast_message.php'; 
            }
        });
    }
    function getModel(){
        return $this->model;
    }
    function getModel2(){
        return $this->model->getInfo($this);
    }
    function getMyDataView(){
        if(isset($_GET['lang']) && isset($_GET['table']) && isset($this->getModel()->getObj()[$_GET['lang']][$_GET['table']]))
            return $this->getModel()->getObj()[$_GET['lang']][$_GET['table']];
        else if(!(isset($_GET['lang']) && isset($_GET['table']))){
            $tableData = array();
            foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                $tableData[$key] = $this->getModel()->getObj()[$key];
            return $tableData;
        }
        else
            return array();
    }
}
$view = new Systemlang();
?>

</head>
<body>
    <div class="start-page container">
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <?php if(!(isset($_GET['lang']) && isset($_GET['table'])))echo'<th>'.$view->getLanguageName().'</th>'?>
                <th><?php echo$view->getLanguageValue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $keyLanguage => $myValue) {
                        if(!(isset($_GET['lang']) && isset($_GET['table'])) && is_array($myValue)){
                            foreach ($myValue as $keyPage => $table) {
                                foreach ($table as $key => $myValue)
                                {
                                    if(is_array($myValue)){
                                        foreach ($myValue as $key2 => $myValue)
                                        {
                                            echo <<<HTML
                                                <tr>
                                                    <td>{$count}</td>
                                                    <td>{$view->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                                                    <td>{$myValue}</td>
                                                    <td>
                                            HTML;
                                            
                                            $title = $view->getScreenModelEdit();
                                            $button = $view->getButtonModelEdit();
                                            $idModel = "editModel".$count;
                                            $idForm = "editForm".$count;
                                            $action = $view->getSCRIPTFILENAME().'?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$key.'&array='.$key2;
                                            include('modal_lang_page.php');
                                            echo '</td></tr>';
                                            $count++;
                                        }
                                    }else{
                                        echo <<<HTML
                                            <tr>
                                                <td>{$count}</td>
                                                <td>{$view->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                                                <td>{$myValue}</td>
                                                <td>
                                        HTML;
                                        
                                        $title = $view->getScreenModelEdit();
                                        $button = $view->getButtonModelEdit();
                                        $idModel = "editModel".$count;
                                        $idForm = "editForm".$count;
                                        $action = $view->getSCRIPTFILENAME().'?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$key;
                                        include('modal_lang_page.php');
                                        echo '</td></tr>';
                                        $count++;
                                    }
                                }

                            }
                        }else if(is_array($myValue)){

                            foreach ($myValue as $key => $myValue){
                                echo <<<HTML
                                    <tr>
                                        <td>{$count}</td>
                                        <td>{$myValue}</td>
                                        <td>
                                HTML;
                                
                                $title = $view->getScreenModelEdit();
                                $button = $view->getButtonModelEdit();
                                $idModel = "editModel".$count;
                                $idForm = "editForm".$count;
                                $action = $view->getSCRIPTFILENAME().'?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage.'&array='.$key;
                                include('modal_lang_page.php');
                                echo '</td></tr>';
                                $count++;
                            }


                        }else{
                            echo <<<HTML
                                <tr>
                                    <td>{$count}</td>
                                    <td>{$myValue}</td>
                                    <td>
                            HTML;
                            $title = $view->getScreenModelEdit();
                            $button = $view->getButtonModelEdit();
                            $idModel = "editModel".$count;
                            $idForm = "editForm".$count;
                            $action = $view->getSCRIPTFILENAME().'?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage;
                            include('modal_lang_page.php');
                            echo '</td></tr>';
                            $count++;
                        }
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <?php if(!(isset($_GET['lang']) && isset($_GET['table'])))echo'<th>'.$view->getLanguageName().'</th>'?>
                <th><?php echo$view->getLanguageValue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        <?php if(!(isset($_GET['lang']) && isset($_GET['table'])))echo'{ "searchable": true, className: "text-left" },'?>
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
    function displayForm(id, inputValue, value){
        removeClass(id);
        openForm(id);
        inputValue.val(value);
    }
</script>
<?php include 'end_html.php'?>