<?php
require 'DeleteInfoName.php';
require 'InformationPage.php';
require 'BranchClass.php';
class AdminMenu extends InformationPage
{
    private $BranchesCompany;
    private $Offcanvas;
    private $Logout;
    private $AdminDashboard;
    private $myMenuApp;
    private $MyBranch;
    private $Ssearch;
    private $ZeroRecords;
    private $LengthMenu;
    private $Info;
    private $InfoEmpty;
    private $InfoFiltered;
    private $ScreenModelEdit;
    private $ButtonModelEdit;
    private $TableId;
    private $TabelEvent;
    function __construct($obj){
        parent::__construct($obj->getModel()->getObj()['Setting']['Language'], $obj);
        $this->Ssearch = $obj->getModel2()['TableInfo']['Ssearch'];
        $this->InfoEmpty = $obj->getModel2()['TableInfo']['InfoEmpty'];
        $this->ZeroRecords = $obj->getModel2()['TableInfo']['ZeroRecords'];
        $this->Info = $obj->getModel2()['TableInfo']['Info'];
        $this->LengthMenu = $obj->getModel2()['TableInfo']['LengthMenu'];
        $this->InfoFiltered = $obj->getModel2()['TableInfo']['InfoFiltered'];
        $this->BranchesCompany = $obj->getModel2()['AppSettingAdmin']['BranchesCompany'];
        $this->Offcanvas = $obj->getModel2()['AppSettingAdmin']['Offcanvas'];
        $this->Logout = $obj->getModel2()['AppSettingAdmin']['Logout'];

        $this->TableId = $obj->getModel2()[$this->getUrlName2()]['TableId'];
        $this->TabelEvent = $obj->getModel2()[$this->getUrlName2()]['TabelEvent'];
        $this->ScreenModelEdit = $obj->getModel2()[$this->getUrlName2()]['ScreenModelEdit'];
        $this->ButtonModelEdit = $obj->getModel2()[$this->getUrlName2()]['ButtonModelEdit'];

        $this->AdminDashboard = $obj->getModel2()['AppSettingAdmin']['AdminDashboard'];
        if($this->getUrlName2() === 'SystemLang'){
            $this->myMenuApp = array('Home'=>$obj->getModel2()['Menu']['Home'], 'SystemLang'=>$obj->getModel2()['Menu']['SystemLang']);
            foreach ($obj->getModel2()['AllNamesLanguage'] as $key => $value){
                $this->myMenuApp[$key] = array($value);
                foreach (array_keys($obj->getModel2()) as $key2 => $table) 
                    $this->myMenuApp[$key][$table] = $obj?->getModel2()[$table]['MYTITLE']??$obj->getModel2()['AppSettingAdmin'][$table];
            }
        }
        else if(isset($obj->getModel2()['MyFlexTables'])){
            $this->myMenuApp = $obj->getModel2()['Menu'];
            $arr = $obj->getModel2()['MyFlexTables'];
            array_unshift($arr, $this->myMenuApp['MyFlexTables']);
            $this->myMenuApp['MyFlexTables'] = $arr;
        }else{
            $this->myMenuApp = $obj->getModel2()['Menu'];
            unset($this->myMenuApp['MyFlexTables']);
        }
        $this->MyBranch = array($obj->getModel()->getFixedId()=>new Branch($obj->getModel2()['AppSettingAdmin']['BranchMain']), ...Branch::fromArray($obj));
        include 'menu_layout.php';
        
    }
    public function getIconByKey($key){
        if($key === 'Home')//--
            return 'box-arrow-left.svg';
        else if($key === 'SystemLang')
                return 'gear.svg';  
        else if($key === 'ChangeLanguage')
            return 'globe-asia-australia.svg';
        else if($key === 'Branches')
            return 'hospital.svg';
        else if($key === 'Login')
            return 'database-exclamation.svg';
        else if($key === 'Register')
            return 'arrows.svg';
        else if($key === 'Menu')
            return 'menu-button-fill.svg';
        else if($key === 'TableInfo')
            return 'person-add.svg';
        else if($key === 'AppSettingAdmin')
            return 'box.svg';
        else if($key === 'SelectTestBox')
            return 'hospital.svg';
        else if($key === 'SelectBranchBox')
            return 'gear.svg';
        else if($key === 'AllNamesLanguage')
            return 'bag-check-fill.svg';
        else if($key === 'CustomTable')
            return 'arrow-up-circle-fill.svg';
        else if($key === 'TablePage')
            return 'calendar4-event.svg';
        else if($key === 'Html')
            return 'bar-chart-line-fill.svg';
        else
            return 'camera2.svg';
    }
    function getScreenModelEdit(){
        return $this->ScreenModelEdit;
    }
    function getButtonModelEdit(){
        return $this->ButtonModelEdit;
    }
    function getTableId(){
        return $this->TableId;
    }
    function getTabelEvent(){
        return $this->TabelEvent;
    }
    function getSsearch(){
        return $this->Ssearch;
    }
    function getZeroRecords(){
        return $this->ZeroRecords;
    }
    function getLengthMenu(){
        return $this->LengthMenu;
    }
    function getInfo(){
        return $this->Info;
    }
    function getInfoEmpty(){
        return $this->InfoEmpty;
    }
    function getInfoFiltered(){
        return $this->InfoFiltered;
    }
    function getMyBranch(){
        return $this->MyBranch;
    }
    function setMyBranch($branch){
        $this->MyBranch = $branch;
    }
    function getMyMenuApp(){
        return $this->myMenuApp;
    }
    function getBranchesCompany(){
        return $this->BranchesCompany;
    }
    function getOffcanvas(){
        return $this->Offcanvas;
    }
    function getLogout(){
        return $this->Logout;
    }
    function getAdminDashboard(){
        return $this->AdminDashboard;
    }
}
