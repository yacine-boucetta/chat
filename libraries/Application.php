<?php


class Application
{

    public static function process()
    {
        if(!empty($_GET['url'])){
            $controllerName=ucfirst($_GET['url']);
        }else{
            $controllerName='Home';
        }
        if(!empty($_GET['task'])){
            $task = $_GET['task'];
        }else{
            $task='view';
        };
var_dump($controllerName);
        $controllerName ="\Controller\\".$controllerName;
        $controller = new $controllerName();
        $controller-> $task();
    }
}
