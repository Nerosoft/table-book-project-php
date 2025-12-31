<?php
require 'page.php';
class MyBranch extends Page{
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
        parent::__construct('Branches');
        $this->branchInputOutput = $this->getModel2()['SelectBranchBox'];
        $this->BranceRaysNameRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysNameRequired'];
        $this->BranceRaysNameLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysNameLength'];
        $this->BranceRaysPhoneRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysPhoneRequired'];
        $this->BranceRaysPhoneLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysPhoneLength'];
        $this->BranceRaysCountryRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysCountryRequired'];
        $this->BranceRaysCountryLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysCountryLength'];
        $this->BranceRaysGovernmentsRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysGovernmentsRequired'];
        $this->BranceRaysGovernmentsLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysGovernmentsLength'];
        $this->BranceRaysCityRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysCityRequired'];
        $this->BranceRaysCityLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysCityLength'];
        $this->BranceRaysStreetRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysStreetRequired'];
        $this->BranceRaysStreetLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysStreetLength'];
        $this->BranceRaysBuildingRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysBuildingRequired'];
        $this->BranceRaysBuildingLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysBuildingLength'];
        $this->BranceRaysAddressRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysAddressRequired'];
        $this->BranceRaysAddressLength = $this->getModel2()[$this->getUrlName2()]['BranceRaysAddressLength'];
        $this->BranceRaysFollowRequired = $this->getModel2()[$this->getUrlName2()]['BranceRaysFollowRequired'];
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
    function getMyDataView(){
        return Branch::fromArray($this->getBranch(), $this->getbranchInputOutput());
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