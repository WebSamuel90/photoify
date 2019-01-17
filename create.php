<?php require __DIR__.'/views/header.php'; ?>

<section>
  <div class="container2">
    <div class="login-form">
      <h1>Sign Up</h1>
      <form action="app/users/create.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="username" required>
        <input type="text" name="name" placeholder="name" required>
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="" value="Create">
      </form>
    </div>
  </div>
</section>

<?php require __DIR__.'/views/footer.php'; ?>
