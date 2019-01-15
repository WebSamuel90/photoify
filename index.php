<?php require __DIR__.'/views/header.php';

if(!$isLoggedIn): ?>

<div class="logo">
    <img class="logo" src="assets/images/logo.png" alt="">
</div>

<div class="intro-nav">
  <a class="sign-up" href="create.php">
    <h2 class=" <?php echo $_SERVER['SCRIPT_NAME'] === '/create.php' ? 'active' : ''; ?>">Sign Up</h2>
    <p>Get Started</p>
  </a>
  <a class="sign-in" href="login.php">
    <h2 class=" <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>">Sign In</h2>
    <p>Existing Account</p>
  </a>
</div>

<?php else:
  redirect('feed.php');
endif;

require __DIR__.'/views/footer.php'; ?>
