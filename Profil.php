<?php 
require('class/User.php');
require('template.php');

if(isset($_POST['valider'])){
$userUpdate=new User;
$userUpdate->userUpdate();
}
?>
<main class="">
        <form class="form" method="post">


                <h2>Profil</h2>
  
        <input id="name" class="input" type="text" placeholder="<?php echo $_SESSION['user']['login'] ?>"name="login" />
        <label for="login" class="placeholder">Login</label>

     
        <input id="email" class="input" type="email" placeholder="<?php echo $_SESSION['user']['email'] ?>"name="email" />
        <label for="email" class="placeholder">email</label>

        <input id="password" class="input" type="password" placeholder="6 caractère minimum"name="password"  />
        <label for="password" class="placeholder">Password</label>

        <input id="password2" class="input" type="password" placeholder="Confirmez le  mot de passe"name="password2"  />
        <label for="password2" class="placeholder">Password</label>

        <button class='submit' name='valider' type="submit">valider</button>

        </form>
    </main>