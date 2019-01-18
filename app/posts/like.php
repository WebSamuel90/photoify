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

redirect('../../feed.php');
