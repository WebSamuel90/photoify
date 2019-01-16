<?php require __DIR__.'/views/header.php'; ?>

<header>
  <a href="/app/users/logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
  <div class="profile-bio">
    <img src="/assets/images/default_profile.jpg" alt="">
    <h2><?php echo $_SESSION['user']['name'] ?></h2>
  </div>
  <div class="edit">
    <a href="editprofile.php">Edit Profile</a>
  </div>
</header>

<?php  require __DIR__.'/views/navigation.php'; ?>
<?php require __DIR__.'/views/footer.php'; ?>
