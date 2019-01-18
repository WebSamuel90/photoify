<?php require __DIR__.'/views/header.php';

$statement = $pdo->prepare('SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY id DESC');

if(!$statement){
  die(var_dump($pdo->errorInfo()));
}

$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

<main>
  <?php foreach($posts as $post):
          if($loggedInUser) {
            $doesUserLikePost= userLikesPost($loggedInUser['id'], $post['post_id']);
            }
            $likes = countLikes($post['post_id']);?>

      <div class="container">
        <div class="card">
          <div class="card-header">
            <div class="profile-img">
              <img src="<?= "app/data/avatars/".$post['profile_pic_url'] ?>" alt="">
            </div>
            <div class="profile-name">
              <p><?= $post['name'] ?></p>
            </div>
            <div class="content">
                <img src="<?= "app/data/posts/".$post['image'] ?>" alt="">
            </div>
            <div class="card-footer">
              <div class="likes">
                <i class="far fa-heart fa-2x" data-id="<?= $post['post_id']?>"></i>
                <h5 class="likes"><?= !empty($likes) ?  $likes :  '0' ?></h5>
              </div>
              <div class="description">
                <p><?= $post['caption'] ?></p>
              </div>
            </div>
          </div>
      </div>
  <?php endforeach; ?>
</main>

<?php require __DIR__.'/views/navigation.php'; ?>
<?php require __DIR__.'/views/footer.php'; ?>
