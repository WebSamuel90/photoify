<?php require __DIR__.'/views/header.php'; ?>

  <section>
    <div class="container2">
      <div class="login-form">
        <h1>Sign in</h1>
        <form action="app/users/login.php" method="post">
          <input class="" type="text" name="username" placeholder="Username" required>
          <input class="" type="password" name="password" placeholder="Password" required>
          <input type="submit" name="" value="Login">
        </form>
      </div>
    </div>
  </section>


<?php require __DIR__.'/views/footer.php'; ?>
