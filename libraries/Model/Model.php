<?php

namespace Model;


require_once('libraries/Database.php');


abstract class Model
{
    
    function __construct(){
        $this->pdo = \Database::getPdo();
    }

   

}
