<?php require('../template2.php');?>
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