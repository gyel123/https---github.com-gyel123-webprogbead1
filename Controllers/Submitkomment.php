<?php

namespace Controllers;

class Submitkomment extends \Core\BaseController
{
    protected $Model;

    public function submitkomment()
    {
        
        $page="submitkomment";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $megj1="";
        $megj2="";

        $hibak = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nev = $_SESSION['login'];
            $komment = $_POST["komment"];
          
            if (empty($komment)) {
                $megj2= "A komment nem lehet üres";
                $hibak++;
            } elseif (strlen($komment) > 300) {
                $megj2= "A komment nem lehet hosszabb 300 karakternél";
                $hibak++;
            }
        }
        if ($hibak == 0) {
            $megj2=$this->Database->addKomment($nev,$komment);
        }
        

        view('hozzaadas/hozzaadas' , compact('page','ablakcim','lablec','oldalak','megj1','megj2'));
        
    }

}