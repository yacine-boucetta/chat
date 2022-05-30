<?php

use Libraries\Controller\Chat;

require('../template2.php'); 
require('../Controller/Chat.php');
$test=new Chat;
$test2=$test->chooseChan();
var_dump($test2);
// $a=Database::getPdo();
// $b=new Chat::chan();
// $sqlinsert = "SELECT * FROM cannal ";
// $test=$a->prepare($sqlinsert);
// $test->execute();
// $test2=$test->fetchall(\PDO::FETCH_ASSOC);
// var_dump($test2);
?>
<main>
  <div name='discord'></div>
  <form>
    <div></div>
    <input name='pseudo' value='<?php echo $_SESSION['user']['id'] ?>' type='hidden'> 

    <textarea name="content" rows="5" cols="33"></textarea>

    <input type='submit' name='submit' value='Envoyer' />

  </form>


</main>

<footer>

</footer>
</body>

</html>