<?php

namespace Controllers;

class Hozzaadas extends \Core\BaseController
{
    protected $Model;

    public function hozzaadas()
    {
        
        $page="hozzaadas";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $megj1="";
        $megj2="";

        view('hozzaadas/hozzaadas' , compact('page','ablakcim','lablec','oldalak','megj1','megj2'));
    }

}