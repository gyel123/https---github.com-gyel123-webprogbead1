<?php

namespace Controllers;

class Soapszerver extends \Core\BaseController
{
    protected $Model;

    public function soapszerver()
    {
        
    }

    public function getPizzaNevek()
    {

        $eredmeny = array(
            "hibakod" => 0,
            "uzenet" => "",
            "pizzak" => array()
        );

        $eredmeny['pizzak']=$this->Database->getPizzaNevek();

        return $eredmeny;
    }

    public function getPizzaAr($pizzaNev)
    {
        $eredmeny = array("hibakod" => 0, "uzenet" => "", "ar" => 0);

        $eredmeny['ar']=$this->Database->getPizzaAr($pizzaNev);

        return $eredmeny;
    }

    public function getPizzaRendelesek($pizzaNev)
    {
        $eredmeny = array(
        "hibakod" => 0,
        "uzenet" => "",
        "rendeles" => array()
        );

        $eredmeny['rendeles'] = $this->Database->getPizzaRendelesek($pizzaNev);

        return $eredmeny;
    }


    public function getPizza()
    {
        $eredmeny = array(
        "hibakod" => 0,
        "uzenet" => "",
        "pizzak" => array()
        );

        //$eredmeny['pizzak'] = $this->Database->getPizza();

        return "xxxxxxxxxx";
        
    }

    public function getKategoria()
    {
        $eredmeny = array(
        "hibakod" => 0,
        "uzenet" => "",
        "kategoriak" => array()
        );

        $eredmeny['kategoriak'] = $this->Database->getKategoria();

        return $eredmeny;
    }

    public function getRendeles()
    {
        $$eredmeny = array(
        "hibakod" => 0,
        "uzenet" => "",
        "rendeles" => array()
        );

        
        $eredmeny['rendeles'] = $this->Database->getRendeles();

        return $eredmeny;
    }

}