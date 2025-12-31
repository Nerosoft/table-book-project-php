<?php include 'admin_title.php';?>
</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'ChangeLanguageCreatePost.php';
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
                        $action = 'ChangeLanguagePost.php';
                        include('start_model.php');
                        include('my_id.php');
                        echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
                        include('end_model.php');

                        if($index !== $view->getLanguage()){
                            $action = 'ChangeLanguageDeletePost.php';
                            include('modal_delete.php');
                        }
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        $action = 'ChangeLanguageEditPost';
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