<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


$hasLiked = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id AND id = :user_id');

$hasLiked->bindParam(':post_id', $_COOKIE['postId'], PDO::PARAM_INT);
$hasLiked->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);

$hasLiked->execute();

$hasLiked = $hasLiked->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare('SELECT likes FROM posts WHERE id = :id');

$statement->bindParam(':id', $_COOKIE['postId'], PDO::PARAM_INT);
$statement->execute();

$currentLikes = $statement->fetch(PDO::FETCH_ASSOC);

$currentLikes = (int)$currentLikes['likes'];

redirect('../../feed.php');
