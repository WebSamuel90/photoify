<?php require __DIR__.'/views/header.php'; ?>

<section>
  <div class="container2">
    <div class="login-form">
      <h1>Update</h1>
      <form action="app/users/update.php" method="post" enctype="multipart/form-data">
        <input class="" type="text" name="username" placeholder="username" required>
        <input class="" type="text" name="name" placeholder="name" required>
        <input class="" type="email" name="email" placeholder="email" required>
        <input ctype="password" name="new-password" placeholder="Password" required>
        <input type="submit" name="" value="Update">
      </form>
    </div>
  </div>
</section>

<?php require __DIR__.'/views/footer.php'; ?>
