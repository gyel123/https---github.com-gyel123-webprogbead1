<?php

namespace Controllers;

class Submithir extends \Core\BaseController
{
    protected $Model;

    public function submithir()
    {
        
        $page="submithir";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $megj1="";
        $megj2="";

        $hibak = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nev = $_SESSION['login'];
            $hir = $_POST["hir"];


            if (empty($hir)) {
                $megj1="A hír nem lehet üres";
                $hibak++;
            } elseif (strlen($hir) > 300) {
                $megj1="A hír nem lehet hosszabb 300 karakternél";
                $hibak++;
            }
        }

        if ($hibak == 0) {
            $megj1=$this->Database->addHir($nev,$hir);
        }


        view('hozzaadas/hozzaadas' , compact('page','ablakcim','lablec','oldalak','megj1','megj2'));
    }

}