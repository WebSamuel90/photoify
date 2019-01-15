<?php require __DIR__.'/views/header.php'; ?>

<a class="nav-link" href="/app/users/logout.php">Logout</a>
<a class="nav-link" href="profile.php">Profile</a>
<a class="nav-link" href="post.php">Post</a>


<?php $posts = getPosts($_SESSION['user']['id'], $pdo);

foreach($posts as $post): ?>
  <div class="container">
    <div class="post">
      <img src="<?php $post['content'] ?>" alt="">
      <div class="caption">

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php require __DIR__.'/views/footer.php'; ?>
