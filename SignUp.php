<?php require('template.php');
require('class/User.php');
$message = '';
if (isset($_POST['sign_up'])) {
    $action = new User;
    $action2 = $action->signUpAction($_POST['login'], $_POST['password'], $_POST['email']);
}


?>
<main class="">
    <form class="form" method="post">

        <h3>Inscription</h3>
        
        <label for="login" class="placeholder">Login</label>
        <input id="name" class="input" type="text" placeholder=" " name="login" required />

        <label for="email" class="placeholder">Email</label>
        <input id="email" class="input" type="email" placeholder=" " name="email" required />


        <label for="password" class="placeholder">Password</label>
       

        <input id="password" class="input" type="password" placeholder=" " name="password" required />
        <p>le mot de passe doit contenir au moins un caractere minuscule</p>
        <p>le mot de passe doit contenir au moins un caractere majuscule</p>
        <p>le mot de passe doit contenir au moins 8 caracteres</p>
        <p>le mot de passe doit contenir au moins 1 chiffre</p>

        <input name='sign_up' type="submit" class='submit' value='inscription' />

    </form>
</main>
</body>