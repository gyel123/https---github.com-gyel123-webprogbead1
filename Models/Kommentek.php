<?php

namespace Models;

use Core\Model;

class Kommentek extends Model
{
    public function showKommentek()
    {
        $Query = "SELECT * FROM kommentek ORDER BY idopont";
        return $this->SelectRow($Query);
    }
}