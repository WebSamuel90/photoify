<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if(isset($_POST['caption'])) {

  $caption = filter_var(trim($_POST['caption']),FILTER_SANITIZE_STRING);

  $statement = $pdo->prepare('UPDATE posts SET caption = :caption WHERE post_id = :post_id');

  if(!$statement){
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':caption', $caption, PDO::PARAM_STR);
  $statement->bindParam(':post_id', $_COOKIE['postId'], PDO::PARAM_INT);
  $statement->execute();
}

redirect('../../profile.php');
