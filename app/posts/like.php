<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


$postsId = $_COOKIE['postId'];
$userId = $_SESSION['user']['id'];

$statement = $pdo->prepare('SELECT * FROM likes WHERE photo_id = :post_id AND user_id = :user_id');

if(!$statement){
  die(var_dump($pdo->errorInfo()));
}

$statement->bindParam(':post_id', $postsId, PDO::PARAM_INT);
$statement->bindParam(':user_id', $userId, PDO::PARAM_INT);

$statement->execute();

$getLikes = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($getLikes)) {
  $removeLikes = $pdo->prepare('DELETE FROM likes WHERE photo_id = :post_id AND user_id = :user_id');

  if(!$removeLikes){
    die(var_dump($pdo->errorInfo()));
  }

  $removeLikes->bindParam(':post_id', $addLikes, PDO::PARAM_INT);
  $removeLikes->bindParam(':user_id', $userId, PDO::PARAM_INT);

  $removeLikes->execute();
} else {

  $addLikes = $pdo->prepare('INSERT INTO likes (photo_id, likes, user_id) VALUES ( :photo_id, :post_id, :user_id)');

  if(!$addLikes){
    die(var_dump($pdo->errorInfo()));
  }

  $addLikes->bindParam(':post_id', $addLikes, PDO::PARAM_INT);
  $addLikes->bindParam(':photo_id', $addLikes, PDO::PARAM_INT);
  $addLikes->bindParam(':user_id', $userId, PDO::PARAM_INT);

  $addLikes->execute();
}

redirect('../../feed.php');
