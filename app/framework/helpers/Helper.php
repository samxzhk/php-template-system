<?php 

namespace App\framework\helpers;

use App\framework\classes\Router;
use \Throwable;

class Helper {

    public static function path() : string{
        return $_SERVER['REQUEST_URI'];
    }
    public static function request() : string {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public static function routerExecute() {
        try {
            $routes = require __DIR__.'/../../routes/routes.php';
            $router = new Router();
            $router->execute($routes);

        } catch(Throwable $th){
            echo "<pre>";
            echo var_dump($th->getMessage());
            echo "</pre>";
        }
    }

}