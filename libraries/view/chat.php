<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="script/discord.js"></script>
  <title>Document</title>
</head>

<body>
    <header style="width:100%;">

    <nav>
    <a href="./">home</a>
      <a href="SignUp">inscription</a>
      <a href="SignIn">connexion</a>
      <?php 
      if(isset($_SESSION['user'])){
        echo "<a href='profil'>Profil</a>&nbsp" ;
        echo "<a href='chat'>Chat</a>&nbsp" ;
        if( $_SESSION['user']['id_droit']==2){
          echo "<a href='Admin'>Admin</a>" ;
          }
      }?>
      
      <a href="disconnect">deconnexion</a>
    </nav>

    </header>

    <main>
      <div name='discord'></div>
      
    
    <form method="post">
      <select name='chan'>
      <?php Chat::chooseChan(); ?>
      </select>

      <input name='pseudo' value='<?php echo $_SESSION['user']['id'] ?>' type='hidden' >  <br />

    <textarea name="content"rows="5" cols="33"></textarea>

        <input type='submit' name='submit'value='Envoyer' />

    </form>


    </main>
    
    <footer>

    </footer>
</body>

</html>