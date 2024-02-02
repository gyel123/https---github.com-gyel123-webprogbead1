<?php

namespace Controllers;

class Belep extends \Core\BaseController
{
    protected $Model;

    public function belep()
    {
        
        $page="belep";

        $ablakcim=config('ablakcim');
        $lablec=config('lablec');
        $oldalak=oldalak();

        if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
            
            $row=$this->Database->checkUser();
            if ($row) {
                $_SESSION['csn'] = $row['csaladi_nev'];
                $_SESSION['un'] = $row['uto_nev'];
                $_SESSION['login'] = $_POST['felhasznalo'];
            }
        } else {
            header("Location: .");
        }

        view('belep/belep' , compact('page','ablakcim','lablec','oldalak','row'));
    }

}