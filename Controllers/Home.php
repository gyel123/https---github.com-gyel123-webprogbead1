<?php

namespace Controllers;

class Home extends \Core\BaseController
{
    protected $Model;

    public function home()
    {
        $arazas = [
            ["nev" => "Pizza(28cm)", "ar" => "2000"],
            ["nev" => "Pizza(32cm)", "ar" => "3000"],
            ["nev" => "Pizza(51cm)", "ar" => "5000"],
            ["nev" => "Szósz", "ar" => "400"]
        ];
        $page="home";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        view('home/home' , compact('arazas','page','ablakcim','lablec','oldalak'));
    }

}