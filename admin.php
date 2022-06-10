<?php
require('class/Chat.php');
require('template.php');
if(isset($_POST['createChan'])){
$discord=new chat;
$discord->createChan($_POST['id_cannal']);
}
if(isset($_POST['suppChan'])){
    $discord=new chat;
    $discord->suppChan($_POST['discordo']);
    $discord->suppChan2($_POST['discordo']);
    }



?>
   <form class="form" method="post" >
        <h2>Connexion</h2>


        <input id="id_cannal" class="input" type="text" placeholder=" " name="id_cannal"  />
        <label for="id_cannal" class="placeholder">Creation cannal</label>


        <button name='createChan' class='submit' type="submit">créer</button>
        <label>choisir le canal en supprimer </label>
        <select name='discordo'>
    <option>choisir le channel
      <?php $channel=new Chat;
      $toto=$channel->chan(); 
    ?>
    </select>
        <button name='suppChan' class='submit' type="submit">supprimer</button>
    </form>