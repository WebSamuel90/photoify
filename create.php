<?php require __DIR__.'/views/header.php'; ?>

<article>
  <h1>Create</h1>

  <form action="app/users/create.php" method="post">

      <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control" type="text" name="username" id="username" required>
      </div><!-- /form-group -->

      <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control" type="text" name="name" id="name" required>
      </div><!-- /form-group -->

      <div class="form-group">
          <label for="eamil">Email</label>
          <input class="form-control" type="emal" name="email" id="email" required>
      </div><!-- /form-group -->

      <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" type="password" name="password" id="password" required>
      </div><!-- /form-group -->

      <button type="submit" class="btn btn-primary">Create</button>
  </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
