<?php
namespace Libraries\Controller;


class Home extends Controller {
function __construct(){

}

public function view(){
require('Libraries/view/Home.php');
}


}