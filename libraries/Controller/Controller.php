<?php
namespace Libraries\Controller;
abstract class Controller{

    
    protected $model;
    protected $modelName;


    function __construct(){
        var_dump($this->modelName);
        $this->model=new $this->modelName();
    }
    }

   
?>