<?php

namespace App\framework\classes;

use App\framework\helpers\Helper;
use Exception;

class Router{

    private string $path;
    private string $request;

    private function routerFound(array $routes = []){
        if(!isset($routes[$this->request])){
            throw new Exception("Route {$this->path} does not exist");
        }
        if(!isset($routes[$this->request][$this->path])){
            throw new Exception("Route {$this->path} does not exist");
        }
        
    }
    private function controllerFound(string $controllerNamespace, string $controller, string $action){
        if(!class_exists($controllerNamespace)){
            throw new Exception("The controller {$controller} does not exist");
        }
        if(!method_exists($controllerNamespace, $action)){
            throw new Exception("The action {$action} does not exist in the controller {$controller}");
        }

    }
    public function execute(array $routes = []){
    
        $this->path = Helper::path();
        echo Helper::path() . "<br>";
        $this->request = Helper::request();
        $this->routerFound($routes);
        [$controller, $action] = explode('@', $routes[$this->request][$this->path]);
        $controllerNamespace = "App\\controllers\\{$controller}";
        $this->controllerFound($controllerNamespace, $controller, $action);
        $controllerInstance = new $controllerNamespace();
        $controllerInstance->{$action}();

    }
}