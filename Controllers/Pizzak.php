<?php

namespace Controllers;

class Pizzak extends \Core\BaseController
{
    protected $Model;

    public function pizzak()
    {
        
        $page="pizzak";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $client =  new \SoapClient(null, array(
            'location' => "http://pizza.vizesnimrodbead1.nhely.hu/beadando1/logicals/soapSzerver.php",
            'uri' => "http://pizza.vizesnimrodbead1.nhely.hu/beadando1/logicals/soapSzerver.php",
            'trace' => 1,
            'exceptions' => 1,
            'soap_version' => SOAP_1_2,
            'style' => SOAP_RPC,
            'use' => SOAP_ENCODED
        ));

        try {
            $pizzak = $client->__soapCall("getPizza",[]);
        } catch (SoapFault $fault) {
            echo "SOAP hiba: " . $fault->getMessage();
        }

        $ar="";
        if(isset($_POST['pizza'])){
            $pizzaNev = $_POST['pizza'];

            $response = $client->__soapCall("getPizzaAr", array($pizzaNev));

            if ($response["hibakod"] == 0) {
                $ar= "Az ár: " . $response["ar"] . " Ft";
            } else {
                $ar= "Hiba: " . $response->uzenet;
            }
        }
        
        
        $rendelesek = $client->getRendeles();

        view('pizzak/pizzak' , compact('page','ablakcim','lablec','oldalak','pizzak','rendelesek','ar'));
    }

}