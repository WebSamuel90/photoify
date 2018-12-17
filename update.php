<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Create</h1>


    <form action="app/users/update.php" method="post">

        <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control" type="text" name="username" value="" required>
          <small class="form-text text-muted">Please provide a username.</small>
        </div>

        <div class="form-group">
          <label for="fullname">Name</label>
          <input class="form-control" type="text" name="name" value="" required>
          <small class="form-text text-muted">Please provide your name.</small>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="" required>
            <small class="form-text text-muted">Please provide an email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <small class="form-text text-muted">Please provide a password.</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
