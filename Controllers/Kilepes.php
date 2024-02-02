<?php

namespace Controllers;

class Kilepes extends \Core\BaseController
{
    protected $Model;

    public function kilepes()
    {
        
        $page="kilepes";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        $data = $_SESSION;
        unset($_SESSION["csn"]);
        unset($_SESSION["un"]);
        unset($_SESSION["login"]);

        view('kilepes/kilepes' , compact('page','ablakcim','lablec','oldalak','data'));
    }

}