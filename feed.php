<?php require __DIR__.'/views/header.php'; ?>

<?php $posts = getPosts($_SESSION['user']['id'], $pdo);

foreach($posts as $post): ?>
  <div class="container">
    <div class="post">
      <img src="<?php $post['content'] ?>" alt="">
      <div class="caption">

      </div>
    </div>
  </div>
<?php endforeach;

require __DIR__.'/views/navigation.php';
require __DIR__.'/views/footer.php'; ?>
