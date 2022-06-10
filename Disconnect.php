<?php
require('class/database.php');
session_destroy();
session_unset();

header('Location:Index.php');

?>