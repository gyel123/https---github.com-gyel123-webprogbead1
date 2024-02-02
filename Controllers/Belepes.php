<?php

namespace Controllers;

class Belepes extends \Core\BaseController
{
    protected $Model;

    public function belepes()
    {
        
        $page="belepes";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        view('belepes/belepes' , compact('page','ablakcim','lablec','oldalak'));
    }

}