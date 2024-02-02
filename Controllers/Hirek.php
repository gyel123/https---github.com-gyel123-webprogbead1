<?php

namespace Controllers;

class Hirek extends \Core\BaseController
{
    protected $Model;

    public function hirek()
    {
        
        $page="hirek";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $rows=$this->Database->showHirek();
        

        view('hirek/hirek' , compact('page','ablakcim','lablec','oldalak','rows'));
    }

}