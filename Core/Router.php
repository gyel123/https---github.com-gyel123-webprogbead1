<?php

namespace Core;

use Exception;

class Router
{
    private $Path;
    private $Parameters = [];
    private $Controller = NULL;
    private $Method = NULL;

    public function __construct()
    {
        $RequestUri = str_replace(config('subdirectory'), '', $_SERVER['REQUEST_URI']);
        $RequestUri = str_replace('//', DIRECTORY_SEPARATOR, $RequestUri);
        $this->Path = parse_url($RequestUri, PHP_URL_PATH);
    }

    public function GetRoute()
    {
        $Routes = require __DIR__ . '/../Routes.php';

        foreach ($Routes as $Route):
            if ($this->ValidateRoute($Route['url'])):
                $this->Controller = $Route['controller'];
                $this->Method = $Route['method'];
                break;
            endif;
        endforeach;


        if ($this->Controller && $this->Method):

            $Instance = new $this->Controller;
            $Method = $this->Method;
            $Instance->$Method(...$this->Parameters);

        else:
            abort();
        endif;
    }

    private function ValidateRoute($RouteUrl): bool
    {
        
        $Uri = array_values(array_filter(explode('/', $RouteUrl)));

        //client url
        $Url = array_values(array_filter(explode('/', $this->Path)));

        if (count($Uri) !== count($Url)):
            return false;
        endif;

        foreach ($Uri as $Key => $Params):

            
            if (preg_match("/{(.*?)}/", $Params)):
                $Param = str_replace(['{', '}'], '', $Params);
                $this->Parameters[$Param] = $Url[$Key];
                continue;
            else:
                if ($Params !== $Url[$Key]):
                    return false;
                endif;
            endif;
        endforeach;

        
        return true;
    }

    /**
     * @throws Exception
     */
    public function GetRouteByName(string $RouteName, array $Data): string
    {
        $Routes = require __DIR__ . '/../Routes.php';
        $SearchRoute = array_search($RouteName, array_column($Routes, 'name'));
        if ($SearchRoute === false) {
            return $RouteName;
        } else {

            $ExtractUrlParams = array_values(array_filter(explode('/', $Routes[$SearchRoute]['url'])));


            foreach ($ExtractUrlParams as $Key => $Param):
                if (preg_match("/{(.*?)}/", $Param)):
                    $Variable = str_replace(['{', '}'], '', $Param);
                    if (in_array($Variable, array_keys($Data))):
                        $ExtractUrlParams[$Key] = $Data[$Variable];
                    else:
                        echo "<h2 style='color:red;text-align:center'>a {{$RouteName}} Route {{$Variable}} értéke nincs definiálva</h2>";
                        throw new Exception("a {{$RouteName}} Route {{$Variable}} értéke nincs definiálva");
                    endif;
                endif;
            endforeach;

            return implode('/', $ExtractUrlParams);
        }
    }
}