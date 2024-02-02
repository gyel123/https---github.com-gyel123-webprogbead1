<?php

namespace Controllers;

class Devizapar extends \Core\BaseController
{
    protected $Model;

    public function devizapar()
    {
        
        $page="devizapar";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $today = date("m/d/Y");
        $eredmeny = $eredmeny2 = $rdate = $currency1 = $currency2 = "";
        $dev = $dev2 = $foo = 0.0;
        $error = "A kiválasztott devizákra az adott napon nem található adat!";
        $er = 0;

        if (isset($_POST['datum']) && isset($_POST['penznem']) && isset($_POST['kuld']) && $_POST['datum'] != "" && $_POST['penznem'] != "" && $_POST['penznem2'] != "") {
            $sdate = explode("/", $_POST['datum']);
            $rdate = $sdate[2] . "-" . $sdate[0] . "-" . $sdate[1];
            $currency1 = $_POST['penznem'];
            $currency2 = $_POST['penznem2'];

            if ($currency1 != "HUF" && $currency2 != "HUF") {
                $eredmeny = simplexml_load_string($this->exc_rates($rdate, $rdate, $currency1));
                $eredmeny2 = simplexml_load_string($this->exc_rates($rdate, $rdate, $currency2));

                if ($eredmeny->count() != 0 && $eredmeny2->count() != 0) {
                    $dev = floatval(str_replace(',', '.', trim($eredmeny->Day->Rate)));
                    $dev2 = floatval(str_replace(',', '.', trim($eredmeny2->Day->Rate)));
                    $foo = $dev / $dev2;
                } else {
                    $er = 1;
                }
            } elseif ($currency1 == "HUF" && $currency2 != "HUF") {
                $eredmeny2 = simplexml_load_string($this->exc_rates($rdate, $rdate, $currency2));
                if ($eredmeny2->count() != 0) {
                    $dev2 = floatval(str_replace(',', '.', trim($eredmeny2->Day->Rate)));
                    $foo = 1 / $dev2;
                } else {
                    $er = 1;
                }
            } elseif ($currency1 != "HUF" && $currency2 == "HUF") {
                $eredmeny = simplexml_load_string($this->exc_rates($rdate, $rdate, $currency1));
                if ($eredmeny->count() != 0) {
                    $dev = floatval(str_replace(',', '.', trim($eredmeny->Day->Rate)));
                    $foo = $dev;
                } else {
                    $er = 1;
                }
            } elseif ($currency1 == "HUF" && $currency2 == "HUF") {
                $foo = 1;
            }
        }

        $currencies="";
        foreach ($this->currencies() as $curr){
            $currencies.='<option value="'.$curr.'">'.$curr.'</option>';
        } 

        view('devizapar/devizapar' , compact('page','ablakcim','lablec','oldalak','currencies','currency1','currency2','rdate','er','foo','error','today'));
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