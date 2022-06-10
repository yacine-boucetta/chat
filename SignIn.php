<?php require('class/User.php');
require('template.php');

    $message='';
    if(isset($_POST['signIn'])){
        $signInAction=new user;
        $signInAction->signInAction($_POST['login'],$_POST['password']);
    }
    ?>
<main class="">
    <form class="form" method="post" >
        <p><?php echo $message; ?></p>
        <h3>Connexion</h3>

<label for="login" class="placeholder">Login</label>
        <input id="name" class="input" type="text" placeholder=" " name="login" required />
        

<label for="password" class="placeholder">Password</label>
        <input id="password" class="input" type="password" placeholder=" " name="password" required />
        
        
        <input name='signIn' class='submit' type="submit" value='connexion'>

</main>
</body>