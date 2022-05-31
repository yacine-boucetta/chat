<?php require('template.php');
require('class/Chat.php');
if(isset($_POST['submit'])){
$discord=new chat;
$discord->insertChat($_POST['content'],$_POST['pseudo'],$_POST['chan']);

}
?>

<main>
  <div name='discord'></div>
  <p>channel:<p>
  <select name='discordo'>
      <?php $channel=new Chat;
      $toto=$channel->chan(); 
    ?>
    </select>
  <form method="post">
    <div></div>
    <select name='chan'>
      <?php $channel=new Chat;
      $toto=$channel->chan(); 
    ?>
    </select>
    <input name='pseudo' value='<?php echo $_SESSION['user']['id'] ?>' type='hidden'> 

    <textarea name="content" rows="5" cols="33"></textarea>

    <input type='submit' name='submit' value='Envoyer' />

  </form>


</main>

<footer>

</footer>
</body>

</html>