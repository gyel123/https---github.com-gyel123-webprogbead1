<?php

namespace Core;

class BaseController
{
    protected $Database;
    protected $Model;

    public function __construct()
    {
        if (isset($this->Model)) {
            $Model = 'Models\\' . $this->Model;
        } else {
            $Controller = explode('\\', static::class);
            $Model = 'Models\\' . end($Controller);
        }

        if (file_exists(str_replace('\\',DIRECTORY_SEPARATOR, $Model) . ".php")) {
            $this->Database = new $Model();
        } else {
            throw new Exception('A fájl nem található');
        }

        
    }
}