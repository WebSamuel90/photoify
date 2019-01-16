<?php require __DIR__.'/views/header.php';

$statement = $pdo->prepare('SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id');

if(!$statement){
  die(var_dump($pdo->errorInfo()));
}

$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

<main>
  <?php foreach($posts as $post): ?>
      <div class="container">
        <div class="post">
          <img src="<?= "app/data/posts/".$post['image'] ?>" alt="">
        </div>
        <div class="caption">
          <img src="<?= "app/data/avatars/".$post['profile_pic_url'] ?>" alt="">
          <i class="fas fa-heart fa-2x"></i>
          <h3><?= $post['caption'] ?></h3>
        </div>
      </div>
  <?php endforeach; ?>
</main>

<?php require __DIR__.'/views/navigation.php'; ?>
<?php require __DIR__.'/views/footer.php'; ?>
