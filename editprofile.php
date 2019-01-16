<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<article>
    <h1>Profile</h1>

    <form action="app/users/update.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="profile-picture">Profile Picture</label>
            <input class="form-control" type="file" name="profile_pic">
        </div><!-- /form-group -->

        <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control" type="text" name="username" value="<?= $user['username'] ?>">
          <small class="form-text text-muted"></small>
        </div>

        <div class="form-group">
          <label for="fullname">Name</label>
          <input class="form-control" type="text" name="name" value="<?= $user['name'] ?>">
          <small class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="<?= $user['email'] ?>">
            <small class="form-text text-muted"></small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Old Password</label>
            <input class="form-control" type="password" name="password" placeholder="Old Password">
            <small class="form-text text-muted"></small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="new-password">New Password</label>
            <input class="form-control" type="password" name="new-password" placeholder="New Password">
            <small class="form-text text-muted"></small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
