<?php require __DIR__.'/views/header.php';

$statement = $pdo->prepare('SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE user_id = :user_id');

if(!$statement){
  die(var_dump($pdo->errorInfo()));
}

$statement->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_STR);

$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

<header>
  <a href="/app/users/logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
  <div class="profile-bio">
    <?php if(isset($_SESSION['user']['profile_pic_url'])):?>
    <img src="<?= "app/data/avatars/".$_SESSION['user']['profile_pic_url'] ?>" alt="">
    <?php else : ?>
    <img src="assets/images/default_profile.jpg" alt="">
    <?php endif; ?>
    <h2><?php echo $_SESSION['user']['name'] ?></h2>
  </div>
  <div class="edit">
    <a href="editprofile.php">Edit Profile</a>
  </div>
</header>
<main>
  <?php foreach($posts as $post): ?>
      <div class="container">
        <div class="post">
          <img src="<?= "app/data/posts/".$post['image'] ?>" alt="">
        </div>
        <div class="caption">
          <img src="<?= "app/data/avatars/".$post['profile_pic_url'] ?>" alt="">
          <i class="far fa-heart fa-2x"></i>
          <h3><?= $post['caption']?></h3>
          <a href="editImages.php"><i class="fas fa-edit fa-2x" data-id="<?= $post['post_id']?>"></i></a>
            <i class="fas fa-trash-alt fa-2x" data-id="<?= $post['post_id']?>"></i>
        </div>
      </div>
  <?php endforeach; ?>
</main>

<?php  require __DIR__.'/views/navigation.php'; ?>
<?php require __DIR__.'/views/footer.php'; ?>
