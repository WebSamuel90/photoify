<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$postId = $_POST['post-id'];
$userId = $loggedInUser['id'];

if ($loggedInUser){
	// check if user already has liked post
	$alreadyLiked = checkIfLiked($userId, $postId);
	// If so, remove like
if ($alreadyLiked) {
	removeLikes($postId, $userId);
	redirect("../../index.php");
}
	// Otherwise, add like
else {
	addLikes($postId, $userId);
	redirect("../../index.php");
}
}
// If not logged in, redirect back to index.
else {
    redirect("../../index.php");
}

// $statement = $pdo->prepare('SELECT * FROM likes WHERE photo_id = :post_id AND user_id = :user_id');
//
// if(!$statement){
//   die(var_dump($pdo->errorInfo()));
// }
//
// $statement->bindParam(':post_id', $postsId, PDO::PARAM_INT);
// $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
//
// $statement->execute();
//
// $getLikes = $statement->fetch(PDO::FETCH_ASSOC);
//
// if(!empty($getLikes)) {
//   $removeLike = $pdo->prepare('DELETE FROM likes WHERE photo_id = :post_id AND user_id = :user_id');
//
//   if(!$removeLike){
//     die(var_dump($pdo->errorInfo()));
//   }
//
//   $removeLike->bindParam(':post_id', $addLikes, PDO::PARAM_INT);
//   $removeLike->bindParam(':user_id', $userId, PDO::PARAM_INT);
//
//   $removeLike->execute();
//
// } else {
//
//   $addLike = $pdo->prepare('INSERT INTO likes (photo_id, likes, user_id) VALUES ( :photo_id, :post_id, :user_id)');
//
//   if(!$addLike){
//     die(var_dump($pdo->errorInfo()));
//   }
//
//   $addLike->bindParam(':post_id', $addLike, PDO::PARAM_INT);
//   $addLike->bindParam(':photo_id', $addLike, PDO::PARAM_INT);
//   $addLike->bindParam(':user_id', $userId, PDO::PARAM_INT);
//
//   $addLike->execute();
// }

redirect('../../feed.php');
