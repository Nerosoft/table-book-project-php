<?php
trait ErrorsHome{
    private $NameTableIsReq;
    private $NameTableIsInv;
    private $InputNumberTableIsReq;
    private $InputNumberTableIsInv;
    function initErrorsHome($page){
        $this->NameTableIsReq = $page['NameTableIsReq'];
        $this->NameTableIsInv = $page['NameTableIsInv'];
        $this->InputNumberTableIsReq = $page['InputNumberTableIsReq'];
        $this->InputNumberTableIsInv = $page['InputNumberTableIsInv']; 
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