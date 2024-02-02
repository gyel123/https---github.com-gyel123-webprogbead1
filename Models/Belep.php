<?php

namespace Models;

use Core\Model;

class Belep extends Model
{
    public function checkUser()
    {
        $Query = "SELECT * FROM felhasznalok WHERE bejelentkezes = '".$_POST['felhasznalo']."' and jelszo = sha1('".$_POST['jelszo']."')";
        return $this->SelectRow($Query,[],true);
    }
}