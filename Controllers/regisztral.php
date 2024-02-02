<?php

namespace Controllers;

class Regisztral extends \Core\BaseController
{
    protected $Model;

    public function Regisztral()
    {
        
        $page="regisztral";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();
        if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
            $result=$this->Database->addUser();
        }else{
            header("Location: .");
        }
        

        view('regisztral/regisztral' , compact('page','ablakcim','lablec','oldalak','result'));
    }

}