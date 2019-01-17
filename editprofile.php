<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>

<section>
  <div class="container2">
    <div class="login-form">
      <h1>Update</h1>
      <form action="app/users/update.php" method="post" enctype="multipart/form-data">
        <input class="" type="file" name="profile_pic">
        <input class="" type="text" name="username" value="<?= $user['username'] ?>">
        <input class="" type="text" name="name" value="<?= $user['name'] ?>">
        <input class="" type="email" name="email" value="<?= $user['email'] ?>">
        <input class="" type="password" name="password" placeholder="Old Password">
        <input ctype="password" name="new-password" placeholder="New Password">
        <input type="submit" name="" value="Update">
      </form>
    </div>
  </div>
</section>

<?php require __DIR__.'/views/footer.php'; ?>
