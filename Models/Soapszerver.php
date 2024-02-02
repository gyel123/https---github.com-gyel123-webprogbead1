<?php

namespace Models;

use Core\Model;

class Soapszerver extends Model
{
    public function getPizzaNevek()
    {
        $Query = "SELECT nev FROM pizza;";
        return $this->SelectRow($Query);
    }
    public function getPizzaAr($pizzaNev)
    {
        $Query = "SELECT k.ar FROM pizza AS p JOIN kategoria AS k ON p.kategorianev = k.nev WHERE p.nev = '".$pizzaNev."';";
        return $this->SelectRow($Query);
    }
    public function getPizzaRendelesek($pizzaNev)
    {
        $Query = "SELECT darab, felvetel, kiszallitas FROM rendeles WHERE rendeles.pizzanev = '".$pizzaNev."';";
        return $this->SelectRow($Query);
    }
    public function getPizza()
    {
        $Query = "SELECT nev, kategorianev FROM pizza;";
        return $this->SelectRow($Query);
    }
    public function getKategoria()
    {
        $Query = "SELECT * FROM kategoria;";
        return $this->SelectRow($Query);
    }
    public function getRendeles()
    {
        $Query = "SELECT pizzanev, darab, felvetel, kiszallitas FROM rendeles;";
        return $this->SelectRow($Query);
    }
}