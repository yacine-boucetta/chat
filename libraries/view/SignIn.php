<?php require('../template2.php');?>
  <main class="">
    <form class="form" method="post" action='../../?url=signIn&task=signInAction'>
      <p><?php echo $message; ?></p>
      <h2>Connexion</h2>


      <input id="name" class="input" type="text" placeholder=" " name="login" required />
      <label for="login" class="placeholder">Login</label>


      <input id="password" class="input" type="password" placeholder=" " name="password" required />
      <label for="password" class="placeholder">Password</label>

      <button name='signIn' class='submit' type="submit">connexion</button>
    </form>

  </main>
</body>