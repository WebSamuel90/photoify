<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$stmt = $pdo->prepare('SELECT * FROM posts WHERE post_id = :post_id');

$stmt->bindParam(':post_id', $_COOKIE['postId'], PDO::PARAM_INT);
$stmt->execute();

$posts = $stmt->fetch(PDO::FETCH_ASSOC);
// die(var_dump("../data/posts/".$posts['image']));
$statement = $pdo->prepare('DELETE FROM posts WHERE post_id = :post_id');

if (!$statement)
{
    die(var_dump($pdo->errorInfo()));
}

$statement->bindParam(':post_id',$_COOKIE['postId'], PDO::PARAM_INT);
$statement->execute();

unlink("../data/posts/".$posts['image']);

redirect('../../profile.php');
