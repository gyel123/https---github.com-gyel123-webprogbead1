<?php

namespace Models;

use Core\Model;

class Regisztral extends Model
{
    public function addUser()
    {
            $Query = "SELECT id FROM felhasznalok WHERE bejelentkezes = '".$_POST['felhasznalo']."'";

            if($row = $this->SelectRow($Query,[],true)) {
                return [ "uzenet" => "A felhasználói név már foglalt!",
                        "ujra" => true];
            }else{
                $Query = "INSERT INTO felhasznalok(id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
                values(0, '".$_POST['vezeteknev']."', '".$_POST['utonev']."', '".$_POST['felhasznalo']."', '".sha1($_POST['jelszo'])."')";
                $newid = $this->InsertRow($Query,[],true);

                return [ "uzenet" => "A regisztrációja sikeres.<br>Azonosítója: {$newid}",
                "ujra" => false];
            }
    }
}