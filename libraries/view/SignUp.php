<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  <main class="">
    <form class="form" method="post" action='../../?url=signUp&task=signUpAction'>
      
        <p><?php echo $message; ?></p>
        <div class='title'>
          <h2>Inscription</h2>

          <input id="name" class="input" type="text" placeholder=" " name="login" required />
          <label for="login" class="placeholder">Login</label>

          <input id="email" class="input" type="email" placeholder=" " name="email" required />
          <label for="email" class="placeholder">Email</label>


          <input id="password" class="input" type="password" placeholder=" " name="password" required />
          <label for="password" class="placeholder">Password</label>
      
          <button name='sign_up' type="submit" class='submit'>sign up</button>

      </div>
    </form>
  </main>
</body>