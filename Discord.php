<?php require('class/Chat.php');
require('template.php');
?>

<main>
  <textarea id='discord' rows="20" cols="45"></textarea>
  <select name='discordo'>
    <option>choisir le channel<option>
      <?php $channel=new Chat;
      $toto=$channel->chan(); 
    ?>
    </select>
    
  <form method="post" class='form2'>
    <input name='chan' value='' type='hidden'> 
    <input name='pseudo' value='<?php echo $_SESSION['user']['id'] ?>' type='hidden'> 

    <textarea id='cont' name="content" rows="5" cols="33" required></textarea>

    <button id='send'type='button' name='submit' value='Envoyer' >envoyer</button>

  </form>


</main>

<footer>

</footer>
</body>

</html>