<?php
require 'page.php';
require 'ErrorBranch.php';
class MyBranch extends Page{
    use ErrorBranch;
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
    private $DataView;
    function __construct(){
        parent::__construct('Branches');
        $this->initErrorBranch($this->getModelPage());
        $this->branchInputOutput = $this->getModel2()['SelectBranchBox'];
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
        $this->DataView = Branch::fromArray($this->getBranch(), $this->getbranchInputOutput());
    }
    function getMyDataView(){
        return $this->DataView;
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