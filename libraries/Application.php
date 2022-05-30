<?php


class Application
{

    public static function process()
    {
        if(!empty($_GET['url'])){
            $controllerName="\Libraries\Controller\\".ucfirst($_GET['url']);
        }else{
            $controllerName= '\Libraries\Controller\Home';
        }
        if(!empty($_GET['task'])){
            $task = $_GET['task'];
        }else{
            $task='view';
        };
        $controllerName =$controllerName;
        $controller = new $controllerName();
        $controller-> $task();
    }
}
