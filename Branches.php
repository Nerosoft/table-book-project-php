<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login.php");
    exit;
}
require 'page.php';
class Branches extends Page{
    private $model;
    private $BranceRaysNameRequired;
    private $BranceRaysPhoneRequired;
    private $BranceRaysGovernmentsRequired;
    private $BranceRaysCityRequired;
    private $BranceRaysStreetRequired;
    private $BranceRaysBuildingRequired;
    private $BranceRaysAddressRequired;
    private $BranceRaysCountryRequired;
    private $BranceRaysFollowRequired;
    private $BranceRaysNameLength;
    private $BranceRaysPhoneLength;
    private $BranceRaysGovernmentsLength;
    private $BranceRaysCityLength;
    private $BranceRaysStreetLength;
    private $BranceRaysBuildingLength;
    private $BranceRaysAddressLength;
    private $BranceRaysCountryLength;
    private $branchInputOutput;
    private $BranchStreet;
    private $BranchName;
    private $BranchPhone;
    private $BranchGovernments;
    private $BranchCity;
    private $BranchBuilding;
    private $BranchAddress;
    private $BranchCountry;
    private $BranchFollow;
    private $BranchRaysName;
    private $BranchRaysPhone;
    private $BranchRaysCountry;
    private $BranchRaysGovernments;
    private $BranchRaysCity;
    private $BranchRaysStreet;
    private $BranchRaysBuilding;
    private $BranchRaysAddress;
    private $selectBox1;
    function __construct(){
        $this->model = new ModelJson();
        $this->branchInputOutput = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']]['SelectBranchBox'];
        $this->BranceRaysNameRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysNameRequired'];
        $this->BranceRaysNameLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysNameLength'];
        $this->BranceRaysPhoneRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysPhoneRequired'];
        $this->BranceRaysPhoneLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysPhoneLength'];
        $this->BranceRaysCountryRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysCountryRequired'];
        $this->BranceRaysCountryLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysCountryLength'];
        $this->BranceRaysGovernmentsRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysGovernmentsRequired'];
        $this->BranceRaysGovernmentsLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysGovernmentsLength'];
        $this->BranceRaysCityRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysCityRequired'];
        $this->BranceRaysCityLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysCityLength'];
        $this->BranceRaysStreetRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysStreetRequired'];
        $this->BranceRaysStreetLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysStreetLength'];
        $this->BranceRaysBuildingRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysBuildingRequired'];
        $this->BranceRaysBuildingLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysBuildingLength'];
        $this->BranceRaysAddressRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysAddressRequired'];
        $this->BranceRaysAddressLength = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysAddressLength'];
        $this->BranceRaysFollowRequired = $this->getModel()->getObj()[$this->getModel()->getObj()['Setting']['Language']][$this->getUrlName2()]['BranceRaysFollowRequired'];
        parent::__construct($this);
        $this->BranchRaysName = $this->getModel2()[$this->getUrlName2()]['BranchRaysName'];
        $this->BranchRaysPhone = $this->getModel2()[$this->getUrlName2()]['BranchRaysPhone'];
        $this->BranchRaysCountry = $this->getModel2()[$this->getUrlName2()]['BranchRaysCountry'];
        $this->BranchRaysGovernments = $this->getModel2()[$this->getUrlName2()]['BranchRaysGovernments'];
        $this->BranchRaysCity = $this->getModel2()[$this->getUrlName2()]['BranchRaysCity'];
        $this->BranchRaysStreet = $this->getModel2()[$this->getUrlName2()]['BranchRaysStreet'];
        $this->BranchRaysBuilding = $this->getModel2()[$this->getUrlName2()]['BranchRaysBuilding'];
        $this->BranchRaysAddress = $this->getModel2()[$this->getUrlName2()]['BranchRaysAddress'];
        $this->selectBox1 = $this->getModel2()[$this->getUrlName2()]['WithRaysOut'];
        
        

        $this->BranchStreet = $this->getModel2()[$this->getUrlName2()]['BranchStreet'];
        $this->BranchName = $this->getModel2()[$this->getUrlName2()]['BranchName'];
        $this->BranchPhone = $this->getModel2()[$this->getUrlName2()]['BranchPhone'];
        $this->BranchGovernments = $this->getModel2()[$this->getUrlName2()]['BranchGovernments'];
        $this->BranchCity = $this->getModel2()[$this->getUrlName2()]['BranchCity'];
        $this->BranchBuilding = $this->getModel2()[$this->getUrlName2()]['BranchBuilding'];
        $this->BranchAddress = $this->getModel2()[$this->getUrlName2()]['BranchAddress'];
        $this->BranchCountry = $this->getModel2()[$this->getUrlName2()]['BranchCountry'];
        $this->BranchFollow = $this->getModel2()[$this->getUrlName2()]['BranchFollow'];
        //get all hint
    }
    function isValid(){
        if(!isset($_POST['Name']) || $_POST['Name'] === '')
            $this->setErrors($this->getBranceRaysNameRequired());
        else if(strlen($_POST['Name']) < 3)
            $this->setErrors($this->getBranceRaysNameLength());
        if(!isset($_POST['Phone']) || $_POST['Phone'] === '')
            $this->setErrors($this->getBranceRaysPhoneRequired());
        else if(!preg_match('/^[0-9]{11}$/', $_POST['Phone']))
            $this->setErrors($this->getBranceRaysPhoneLength());
        if(!isset($_POST['Country']) || $_POST['Country'] === '')
            $this->setErrors($this->getBranceRaysCountryRequired());
        else if(strlen($_POST['Country']) < 3)
            $this->setErrors($this->getBranceRaysCountryLength());
        if(!isset($_POST['Governments']) || $_POST['Governments'] === '')
            $this->setErrors($this->getBranceRaysGovernmentsRequired());
        else if(strlen($_POST['Governments']) < 3)
            $this->setErrors($this->getBranceRaysGovernmentsLength());
        if(!isset($_POST['City']) || $_POST['City'] === '')
            $this->setErrors($this->getBranceRaysCityRequired());
        else if(strlen($_POST['City']) < 3)
            $this->setErrors($this->getBranceRaysCityLength());
        if(!isset($_POST['Street']) || $_POST['Street'] === '')
            $this->setErrors($this->getBranceRaysStreetRequired());
        else if(strlen($_POST['Street']) < 3)
            $this->setErrors($this->getBranceRaysStreetLength());
        if(!isset($_POST['Building']) || $_POST['Building'] === '')
            $this->setErrors($this->getBranceRaysBuildingRequired());
        else if(strlen($_POST['Building']) < 3)
            $this->setErrors($this->getBranceRaysBuildingLength());
        if(!isset($_POST['Address']) || $_POST['Address'] === '')
            $this->setErrors($this->getBranceRaysAddressRequired());
        else if(strlen($_POST['Address']) < 3)
            $this->setErrors($this->getBranceRaysAddressLength());
        if(!isset($_POST['Follow']) || $_POST['Follow'] === '')
            $this->setErrors($this->getBranceRaysFollowRequired());
        else if(!isset($this->getModel2()['SelectBranchBox'][$_POST['Follow']]))
            $this->setErrors($this->getModel2()[$this->getUrlName2()]['BranceRaysFollowValue']);
        if($this->isEmptyErrors()){
            $file = $this->getModel()->getFile();
            $keyId = $_POST['id']??$this->getModel()->getRandomId();
            if(!isset($_POST['id'])){
                $obj = $this->getModel()->getFileByFixedId();
                unset($obj['Branches'], $obj['Users']);
                $file [$keyId] = $obj;
            }else
                unset($_POST['id']);
            $file[$this->getModel()->getFixedId()]['Branches'][$keyId] = $_POST;
            $this->getModel()->saveFile($file);
        }
    }
    function makeDeleteItem(){
        $file = $this->getModel()->getFile();
        if(count($file[$this->getModel()->getFixedId()]['Branches']) === 1)
            unset($file[$this->getModel()->getFixedId()]['Branches']);
        else
            unset( $file[$this->getModel()->getFixedId()]['Branches'][$_POST['id']]);
        unset($file[$_POST['id']]);
        $this->getModel()->saveFile($file);
    }
    function getMyDataView(){
        return Branch::fromArray($this, $this->getbranchInputOutput());
    }
    function getModel(){
        return $this->model;
    }
    function getModel2(){
        return $this->model->getInfo($this);
    }

    function getBranceRaysNameRequired(){
        return $this->BranceRaysNameRequired;
    }
    function getBranceRaysPhoneRequired(){
        return $this->BranceRaysPhoneRequired;
    }
    function getBranceRaysGovernmentsRequired(){
        return $this->BranceRaysGovernmentsRequired;
    }
    function getBranceRaysCityRequired(){
        return $this->BranceRaysCityRequired;
    }
    function getBranceRaysStreetRequired(){
        return $this->BranceRaysStreetRequired;
    }
    function getBranceRaysBuildingRequired(){
        return $this->BranceRaysBuildingRequired;
    }
    function getBranceRaysAddressRequired(){
        return $this->BranceRaysAddressRequired;
    }
    function getBranceRaysCountryRequired(){
        return $this->BranceRaysCountryRequired;
    }
    function getBranceRaysFollowRequired(){
        return $this->BranceRaysFollowRequired;
    }
    function getBranceRaysNameLength(){
        return $this->BranceRaysNameLength;
    }
    function getBranceRaysPhoneLength(){
        return $this->BranceRaysPhoneLength;
    }
    function getBranceRaysGovernmentsLength(){
        return $this->BranceRaysGovernmentsLength;
    }
    function getBranceRaysCityLength(){
        return $this->BranceRaysCityLength;
    }
    function getBranceRaysStreetLength(){
        return $this->BranceRaysStreetLength;
    }
    function getBranceRaysBuildingLength(){
        return $this->BranceRaysBuildingLength;
    }
    function getBranceRaysAddressLength(){
        return $this->BranceRaysAddressLength;
    }
    function getBranceRaysCountryLength(){
        return $this->BranceRaysCountryLength;
    }
    function getbranchInputOutput(){
        return $this->branchInputOutput;
    }
    function getBranchStreet(){
        return $this->BranchStreet;
    }
    function getBranchName(){
        return $this->BranchName;
    }
    function getBranchPhone(){
        return $this->BranchPhone;
    }
    function getBranchGovernments(){
        return $this->BranchGovernments;
    }
    function getBranchCity(){
        return $this->BranchCity;
    }
    function getBranchBuilding(){
        return $this->BranchBuilding;
    }
    function getBranchAddress(){
        return $this->BranchAddress;
    }
    function getBranchCountry(){
        return $this->BranchCountry;
    }
    function getBranchFollow(){
        return $this->BranchFollow;
    }
    function getBranchRaysName(){
        return $this->BranchRaysName;
    }
    function getBranchRaysPhone(){
        return $this->BranchRaysPhone;
    }
    function getBranchRaysCountry(){
        return $this->BranchRaysCountry;
    }
    function getBranchRaysGovernments(){
        return $this->BranchRaysGovernments;
    }
    function getBranchRaysCity(){
        return $this->BranchRaysCity;
    }
    function getBranchRaysStreet(){
        return $this->BranchRaysStreet;
    }
    function getBranchRaysBuilding(){
        return $this->BranchRaysBuilding;
    }
    function getBranchRaysAddress(){
        return $this->BranchRaysAddress;
    }
    function getselectBox1(){
        return $this->selectBox1;
    }
}
$view = new Branches();
?>
</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            include('model_branch.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getBranchName()?></th>
                <th><?php echo$view->getBranchPhone()?></th>
                <th><?php echo$view->getBranchGovernments()?></th>
                <th><?php echo$view->getBranchCity()?></th>
                <th><?php echo$view->getBranchStreet()?></th>
                <th><?php echo$view->getBranchBuilding()?></th>
                <th><?php echo$view->getBranchAddress()?></th>
                <th><?php echo$view->getBranchCountry()?></th>
                <th><?php echo$view->getBranchFollow()?></th>
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
                                <td>{$myObject->getPhone()}</td>
                                <td>{$myObject->getGovernments()}</td>
                                <td>{$myObject->getCity()}</td>
                                <td>{$myObject->getStreet()}</td>
                                <td>{$myObject->getBuilding()}</td>
                                <td>{$myObject->getAddress()}</td>
                                <td>{$myObject->getCountry()}</td>
                                <td>{$myObject->getFollowId()}</td>
                                <td>
                        HTML;
                        if($view->getModel()->getId() !== $index)
                            include('modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        include('model_branch.php');
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm($('#{$idForm}').find('#brance-rays-name'), $('#{$idForm}').find('#brance-rays-phone'), $('#{$idForm}').find('#brance-rays-country'), $('#{$idForm}').find('#brance-rays-governments'), $('#{$idForm}').find('#brance-rays-city'), $('#{$idForm}').find('#brance-rays-street'), $('#{$idForm}').find('#brance-rays-building'), $('#{$idForm}').find('#brance-rays-address'), $('#{$idForm}').find('#brance-rays-follow option'), '#{$idModel}', '{$myObject->getName()}', '{$myObject->getPhone()}', '{$myObject->getGovernments()}', '{$myObject->getCity()}', '{$myObject->getStreet()}', '{$myObject->getBuilding()}', '{$myObject->getAddress()}', '{$myObject->getCountry()}', '{$myObject->getFollowId()}')"/>
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
                <th><?php echo$view->getBranchName()?></th>
                <th><?php echo$view->getBranchPhone()?></th>
                <th><?php echo$view->getBranchGovernments()?></th>
                <th><?php echo$view->getBranchCity()?></th>
                <th><?php echo$view->getBranchStreet()?></th>
                <th><?php echo$view->getBranchBuilding()?></th>
                <th><?php echo$view->getBranchAddress()?></th>
                <th><?php echo$view->getBranchCountry()?></th>
                <th><?php echo$view->getBranchFollow()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];

    function displayEditForm(brance_rays_name, brance_rays_phone, brance_rays_country, brance_rays_governments, brance_rays_city, brance_rays_street, brance_rays_building, brance_rays_address, brance_rays_follow, id, nameTest, phoneTest, countryTest, governmentsTest, cityTest, streetTest, buildingTest, addressTest, followTest){
        removeClass(id);
        openForm(id);
        brance_rays_name.val(nameTest);
        brance_rays_phone.val(phoneTest);
        brance_rays_country.val(countryTest);
        brance_rays_governments.val(governmentsTest);
        brance_rays_city.val(cityTest);
        brance_rays_street.val(streetTest);
        brance_rays_building.val(buildingTest);
        brance_rays_address.val(addressTest);
        brance_rays_follow.each(function(idx, el){
            if($(this).html() === followTest)
                $(this).prop('selected', true);
        });
    }
</script>
<?php include 'end_html.php'?>