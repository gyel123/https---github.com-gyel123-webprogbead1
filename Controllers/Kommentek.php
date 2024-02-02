<?php

namespace Controllers;

class Kommentek extends \Core\BaseController
{
    protected $Model;

    public function kommentek()
    {
        
        $page="kommentek";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $rows=$this->Database->showKommentek();
        

        view('kommentek/kommentek' , compact('page','ablakcim','lablec','oldalak','rows'));
    }

}