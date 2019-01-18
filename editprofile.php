<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<article>
  <h1>Update</h1>

  <form action="app/users/update.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="profile_pic">Profile Picture</label>
        <input class="form-control" type="file" name="profile_pic" id="profile_pic">
    </div><!-- /form-group -->

      <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control" type="text" name="username" id="username" value="<?= $user['username'] ?>">
      </div><!-- /form-group -->

      <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control" type="text" name="name" id="name" value="<?= $user['name'] ?>">
      </div><!-- /form-group -->

      <div class="form-group">
          <label for="eamil">Email</label>
          <input class="form-control" type="emal" name="email" id="email" value="<?= $user['email'] ?>">
      </div><!-- /form-group -->

      <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" type="password" name="password" id="password" placeholder="New Password">
      </div><!-- /form-group -->

      <button type="submit" class="btn btn-primary">Update</button>
  </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
