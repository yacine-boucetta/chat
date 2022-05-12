<?php
spl_autoload_register(function ($className) {
    //className =controller\
    //require =
    var_dump($className);
    $className = str_replace("\\", "/", $className);
   

    require_once("libraries/$className.php");
});

?>