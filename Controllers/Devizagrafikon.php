<?php

namespace Controllers;

class Devizagrafikon extends \Core\BaseController
{
    protected $Model;

    public function devizagrafikon()
    {
        
        $page="devizagrafikon";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $today = date("m/d/Y");
        $eredmeny = $rdate1 = $rdate2 = $currency1 = $currency2 = "";
        $dev = $dev2 = $foo = 0.0;
        $error = "A kiválasztott devizákra az adott napon nem található adat!";
        $er = 0;

        if (isset($_POST['datum1']) && isset($_POST['datum2']) && isset($_POST['penznem']) && isset($_POST['kuld']) && $_POST['datum1'] != "" && $_POST['datum2'] != "" && $_POST['penznem'] != "" && $_POST['penznem2'] != "") {
            $sdate1 = explode("/", $_POST['datum1']);
            $rdate1 = $sdate1[2] . "-" . $sdate1[0] . "-" . $sdate1[1];

            $sdate2 = explode("/", $_POST['datum2']);
            $rdate2 = $sdate2[2] . "-" . $sdate2[0] . "-" . $sdate2[1];

            $currency1 = $_POST['penznem'];
            $currency2 = $_POST['penznem2'];

            $eredmeny = simplexml_load_string($this->exc_rates($rdate1, $rdate2, $currency1 . ',' . $currency2));
        }

        $chartData = [];
        if($eredmeny!=""){
            foreach ($eredmeny->Day as $day) {
                $row = [
                    'Dátum' => $day->attributes()->date->__toString()
                ];
    
                foreach ($day->Rate as $rate) {
                    $row[$rate->attributes()->curr->__toString()] = (float)$rate->__toString();
                }
    
                $chartData[] = $row;
            }
        }
        

        $currencies="";
        foreach ($this->currencies() as $curr){
            $currencies.='<option value="'.$curr.'">'.$curr.'</option>';
        } 

        view('devizagrafikon/devizagrafikon' , compact('page','ablakcim','lablec','oldalak','currencies','currency1','currency2','er','foo','error','today','rdate1','rdate2','eredmeny','chartData'));
    }

    public function currencies()
    {
        $client = new \SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
        $result = new \SimpleXMLElement($client->GetCurrencies()->GetCurrenciesResult);
        $stack = [];
        foreach ($result->xpath("//Currencies/Curr") as $item) {
            $stack[] = $item[0]->__toString();
        }
        return $stack;
    }

    public function exc_rates($start_date, $end_date, $currency)
    {
        $soapClient = new \SoapClient("http://www.mnb.hu/arfolyamok.asmx?singleWsdl");
        $res = $soapClient->GetExchangeRates(['startDate' => $start_date, 'endDate' => $end_date, 'currencyNames' => $currency]);
        return $res->GetExchangeRatesResult;
    }
    
}