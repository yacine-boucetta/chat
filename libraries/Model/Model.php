<?php

namespace Libraries\Model;


require_once('../Database.php');


abstract class Model
{
    
    function __construct(){
        $this->pdo = \Database::getPdo();
    }

   

}
