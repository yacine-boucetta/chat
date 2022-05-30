<?php
class Http{

/** 
 * *redirige levisiteur ver $ url
   * @param string $url
    *@return void
*/
static public function redirect(string $url):void{
    header("Location: $url");
    
}
}