<?php

namespace Models;

use Core\Model;

class Submitkomment extends Model
{
    public function addKomment($nev, $komment)
    {
        
        $Query = "INSERT INTO kommentek (nev, komment) VALUES ('".$nev."', '".$komment."')";
        $lastid = $this->InsertRow($Query,[],true);
        
        return "Sikeres komment hozzáadás!";
    }
}