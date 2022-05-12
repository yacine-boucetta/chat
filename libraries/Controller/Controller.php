<?php
namespace Controller;


abstract class Controller{

    
    protected $model;
    protected $modelName;


    function __construct(){
        $this->model=new $this->modelName();
    }
    }

   
?>