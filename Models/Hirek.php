<?php

namespace Models;

use Core\Model;

class Hirek extends Model
{
    public function showHirek()
    {
        $Query = "SELECT * FROM hirek ORDER BY idopont";
        return $this->SelectRow($Query);
    }
}