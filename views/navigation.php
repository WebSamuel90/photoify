
<!-- <sidebar class="sidebar">
  <nav>
    <ul>
      <li><a href="#">Follow</a></li>
      <li><a href="#">Like</a></li>
      <li><a href="#">Comment</a></li>
    </ul>
  </nav>
</sidebar> -->

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
      </li>

      <li class="nav-item">
            <?php if (isset($_SESSION['user'])): ?>
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
            <?php endif; ?>
        </li>

        <li class="nav-item">
              <?php if (isset($_SESSION['user'])): ?>
                  <a class="nav-link" href="profile.php">Profile</a>
              <?php else: ?>
                  <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/create.php' ? 'active' : ''; ?>" href="create.php">Create</a>
              <?php endif; ?>
          </li>


  </ul>
</nav>
