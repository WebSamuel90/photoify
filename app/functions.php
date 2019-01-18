<?php

declare(strict_types=1);


if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

// Setup the database connection.
function connectToDB(): PDO {
    static $pdo;
    if ($pdo instanceof PDO) {
        return $pdo;
    }
    // Fetch the global configuration array.
    $config = require __DIR__.'/config.php';
    // Setup database connection
    $pdo = new PDO($config['database_path']);
    return $pdo;
}

// Get logged in user info
function getUser(string $userId): array {

  $pdo = connectToDB();

  $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');

  if(!$statement){
    die(var_dump($pdo->errorInfo()));
  }
  $statement->bindParam(':id', $userId, PDO::PARAM_STR);
  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
      return null;
  }
  return $user;
}

// Check if user has liked posts
function checkIfLiked(string $userId, string $postId): bool{
	$pdo = connectToDB();
	$getLikes = $pdo->prepare('SELECT count(*) FROM likes WHERE post_id = :post_id and user_id = :user_id');
    if (!$getLikes) {
        die(var_dump($pdo->errorInfo()));
    }
	$getLikes->bindParam(':post_id', $postId, PDO::PARAM_INT);
	$getLikes->bindParam('user_id', $userId, PDO::PARAM_INT);
    $getLikes->execute();
	$likes = $getLikes->fetch(PDO::FETCH_NUM);
	if ($likes[0] === "0") {
		return false;
	}
	else {
		return true;
	}
}

function countLikes(string $postId): int{
    $pdo = connectToDB();
    $getLikes = $pdo->prepare('SELECT * FROM likes WHERE post_id=:post_id');
    if (!$getLikes) {
        die(var_dump($pdo->errorInfo()));
    }
    $getLikes->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $getLikes->execute();
    $likes = $getLikes->fetchAll(PDO::FETCH_ASSOC);
    $currentLikes = count($likes);
    return $currentLikes;
}

// Add likes to post
function addLikes(string $postId, string $userId): void{
    $pdo = connectToDB();
    $addLikes = $pdo->prepare('INSERT INTO likes (likes, post_id, user_id) VALUES (1, :post_id, :user_id)');
    if (!$addLikes) {
        die(var_dump($pdo->errorInfo()));
    }
    $addLikes->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $addLikes->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $addLikes->execute();
}

// Remove likes from post
function removeLikes(string $postId, string $userId): void{
    $pdo = connectToDB();
    $removeLikes = $pdo->prepare('DELETE FROM likes WHERE user_id=:user_id AND post_id=:post_id');
    if (!$removeLikes) {
        die(var_dump($pdo->errorInfo()));
    }
    $removeLikes->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $removeLikes->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $removeLikes->execute();
}

// Check if user likes post
function userLikesPost(string $userId, string $postId){
    $pdo = connectToDB();
    $getLikes = $pdo->prepare('SELECT * FROM likes WHERE user_id=:user_id AND post_id=:post_id ');
    if (!$getLikes) {
        die(var_dump($pdo->errorInfo()));
    }
    $getLikes->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $getLikes->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $getLikes->execute();
    $doesUserLikeThisPost = $getLikes->fetch(PDO::FETCH_ASSOC);
    return $doesUserLikeThisPost;
}
