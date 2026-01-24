<?php
require 'InformationPage.php';
require 'MyLanguage.php';
require 'ErrorsHomeName.php';
require 'ErrorLoginRegister.php';
class LoginRegister extends InformationPage{
    use ErrorLoginRegister, ErrorsHomeName;
    private $TitleForm;
    private $LabelEmail;
    private $HintEmail;
    private $LabelPassword;
    private $HintPassword;
    private $ButtonName;
    private $MyLanguage;
    private $ChangeLanguageButton;
    private $ModelTitle;
    private $ModelButton;
    private $dbKeys;
    private $dbBranchKeys;
    private $DbKeyLabel;
    private $myIdBranch;
    private $AppLabel;
    private $BranchLabel;
    private $AllBranch;
    private $ModalTitleProject;
    private $ModalButtonProject;
    private $NameLabel;
    private $NameHint;
    private $ButtonSetupProject;
    function getModalTitleProject(){
        return $this->ModalTitleProject;
    }
    function getModalButtonProject(){
        return $this->ModalButtonProject;
    }
    function getButtonSetupProject(){
        return $this->ButtonSetupProject;
    }
    function getNameLabel(){
        return $this->NameLabel;
    }
    function getNameHint(){
        return $this->NameHint;
    }
    function getAllBranch(){
        return $this->AllBranch;
    }
    function getAppLabel(){
        return $this->AppLabel;
    }
    function getBranchLabel(){
        return $this->BranchLabel;
    }
    function getMyIdBranch(){
        return $this->myIdBranch;
    }
    function getDbKeys(){
        return $this->dbKeys;
    }
    function getDbBranchKeys(){
        return $this->dbBranchKeys;
    }

    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage);
        $this->initErrorsLoginRegister($this->getModelPage());
        $this->initErrorsHomeName($this->getModelPage());
        $this->TitleForm = $this->getModelPage()['TitleForm'];
        $this->LabelEmail = $this->getModelPage()['LabelEmail'];
        $this->HintEmail = $this->getModelPage()['HintEmail'];
        $this->LabelPassword = $this->getModelPage()['LabelPassword'];
        $this->HintPassword = $this->getModelPage()['HintPassword'];
        $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
        $this->ButtonName = $this->getModelPage()['ButtonName'];
        $this->ChangeLanguageButton = $this->getModelPage()['ChangeLanguageButton'];
        $this->ModelTitle = $this->getModelPage()['ModelTitle'];
        $this->ModelButton = $this->getModelPage()['ModelButton'];
        $this->DbKeyLabel = $this->getModelPage()['DbKeyLabel'];
        $this->AppLabel = $this->getModelPage()['AppLabel'];
        $this->BranchLabel = $this->getModelPage()['BranchLabel'];
        $this->AllBranch = $this->getModelPage()['AllBranch'];
        $this->ModalTitleProject = $this->getModelPage()['ModalTitleProject'];
        $this->ModalButtonProject = $this->getModelPage()['ModalButtonProject'];
        $this->ButtonSetupProject = $this->getModelPage()['ButtonSetupProject'];
        $this->NameLabel = $this->getModelPage()['NameLabel'];
        $this->NameHint = $this->getModelPage()['NameHint'];
        foreach ($this->getFile() as $key => $obj)
            if(isset($obj['State']) && $obj['State'] === 'admin'){
                $this->dbKeys[$key] = $obj[$obj['Setting']['Language']]['AppSettingAdmin']['AdminDashboard'];
                if($this->getId() === $key || isset($obj['Branches']) && in_array($this->getId(), array_keys($obj['Branches'])) || isset($_GET['id']) && $_GET['id'] === $key || isset($obj['Branches']) && isset($_GET['id']) && in_array($_GET['id'], array_keys($obj['Branches']))){
                    $this->myIdBranch = $key;
                    $this->dbBranchKeys[$key]['Name'] = $obj[$obj['Setting']['Language']]['AppSettingAdmin']['BranchMain'];
                    if(isset($obj['Branches']))
                        $this->dbBranchKeys = $this->dbBranchKeys + $obj['Branches'];
                    
                }
            }
        include 'title_html.php';
        $this->showToast($this->getModelPage()[$message], $type);
        include 'change_language_model.php';
    }
    function getDbKeyLabel(){
        return $this->DbKeyLabel;
    }
    function getChangeLanguageButton(){
        return $this->ChangeLanguageButton;
    }
    function getModelTitle(){
        return $this->ModelTitle;
    }
    function getModelButton(){
        return $this->ModelButton;
    }
    function getMyLanguage(){
        return $this->MyLanguage;
    }
    function getTitleForm(){
        return $this->TitleForm;
    }
    function getLabelEmail(){
        return $this->LabelEmail;
    }
    function getHintEmail(){
        return $this->HintEmail;
    }
    function getLabelPassword(){
        return $this->LabelPassword;
    }
    function getHintPassword(){
        return $this->HintPassword;
    }
    function getButtonName(){
        return $this->ButtonName;
    }
}
