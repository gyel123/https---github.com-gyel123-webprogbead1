<?php

namespace Models;

use Core\Model;

class Submithir extends Model
{
    public function addHir($nev, $hir)
    {
        $Query = "INSERT INTO hirek (nev, hir) VALUES ('".$nev."', '".$hir."')";
        $lastid = $this->InsertRow($Query,[],true);
        
        return "Sikeres hír hozzáadás!";
    }
}