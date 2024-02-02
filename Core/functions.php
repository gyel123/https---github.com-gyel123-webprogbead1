<?php

function dd($var){
    var_dump($var);
    exit;
}

function oldalak(){
    return array(
        'home' => array('fajl' => 'cimlap', 'szoveg' => 'Címlap', 'menun' => array(1,1)),
        'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
        'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
        'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
        'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
        'hozzaadas' => array('fajl' => 'hozzaadas', 'szoveg' => 'Hozzáadás', 'menun' => array(0,1)),
        'kommentek' => array('fajl' => 'kommentek', 'szoveg' => 'Kommentek', 'menun' => array(0,1)),
        'hirek' => array('fajl' => 'hirek', 'szoveg' => 'Hírek', 'menun' => array(0,1)),
        'pizzak' => array('fajl' => 'pizzak', 'szoveg' => 'Pizzák', 'menun' => array(0,1)),
        'devizaPar' => array('fajl' => 'devizaPar', 'szoveg' => 'Devizák', 'menun' => array(1,1)),
        'devizaGrafikon' => array('fajl' => 'devizaGrafikon', 'szoveg' => 'Grafikon', 'menun' => array(1,1))
    );
}


function view($Name, $Data = [])
{
    extract($Data);
    if (file_exists(__DIR__ . "/../Views/$Name.php")):
        require_once __DIR__ . "/../Views/$Name.php";
    else:
        echo "<h1 style='color: red;text-align: center'>View [$Name] Not found</h1>";
        exit();
    endif;
}

function config($Key)
{
    $Config = require __DIR__ . '/config.php';

    if (array_key_exists($Key, $Config)):
        return $Config[$Key];
    else:
        echo "<h1 style='color: red;text-align: center'>[$Key] nincs a config.php fájlban</h1>";
        exit();
    endif;
}


function route($RouteName, $Data = []): string
{
    return config('app_url') . (new Core\Router)->GetRouteByName($RouteName, $Data);
}

function redirect($RouteName, $Data = [])
{
    header('Location: ' . route($RouteName, $Data));
    exit();
}

function public_dir(string $File): string
{
    if (strpos($File, '/') === 0):
        $File = substr($File, 1);
    endif;

    return config('public_url') . $File;
}

function abort($Code = 404)
{
    http_response_code($Code);

    if (file_exists(__DIR__ . "/../Views/errors/$Code.php")) {
        view("errors/$Code");
    } else {
        echo "Error $Code";
    }

    exit();
}

