<?php

return [

    [
        "url" => "/",
        "name" => "home",
        'controller' => \Controllers\Home::class,
        'method' => 'home'
    ],
    [
        "url" => "/home",
        "name" => "home",
        'controller' => \Controllers\Home::class,
        'method' => 'home'
    ],
    [
        "url" => "/belepes",
        "name" => "belepes",
        'controller' => \Controllers\Belepes::class,
        'method' => 'belepes'
    ],
    [
        "url" => "/belep",
        "name" => "belep",
        'controller' => \Controllers\Belep::class,
        'method' => 'belep'
    ],
    [
        "url" => "/kilepes",
        "name" => "kilepes",
        'controller' => \Controllers\Kilepes::class,
        'method' => 'kilepes'
    ],
    [
        "url" => "/regisztral",
        "name" => "regisztral",
        'controller' => \Controllers\Regisztral::class,
        'method' => 'regisztral'
    ],
    [
        "url" => "/devizaPar",
        "name" => "devizapar",
        'controller' => \Controllers\Devizapar::class,
        'method' => 'devizapar'
    ],
    [
        "url" => "/devizaGrafikon",
        "name" => "devizagrafikon",
        'controller' => \Controllers\Devizagrafikon::class,
        'method' => 'devizagrafikon'
    ],
    [
        "url" => "/hozzaadas",
        "name" => "hozzaadas",
        'controller' => \Controllers\Hozzaadas::class,
        'method' => 'hozzaadas'
    ],
    [
        "url" => "/submit-hir",
        "name" => "submithir",
        'controller' => \Controllers\Submithir::class,
        'method' => 'submithir'
    ],
    [
        "url" => "/submit-komment",
        "name" => "submitkomment",
        'controller' => \Controllers\Submitkomment::class,
        'method' => 'submitkomment'
    ],
    [
        "url" => "/kommentek",
        "name" => "kommentek",
        'controller' => \Controllers\Kommentek::class,
        'method' => 'kommentek'
    ],
    [
        "url" => "/hirek",
        "name" => "hirek",
        'controller' => \Controllers\Hirek::class,
        'method' => 'hirek'
    ],
    [
        "url" => "/soapSzerver",
        "name" => "soapszerver",
        'controller' => \Controllers\Soapszerver::class,
        'method' => 'soapszerver'
    ],
    [
        "url" => "/pizzak",
        "name" => "pizzak",
        'controller' => \Controllers\Pizzak::class,
        'method' => 'pizzak'
    ]

];