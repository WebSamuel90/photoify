<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if($isLoggedIn && isset($_FILES['content'], $_POST['caption'])) {
   $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];

   $caption = filter_var(trim($_POST['caption']),FILTER_SANITIZE_STRING);

   $postDir = __DIR__."/../data/posts/";

   $fileInfo = pathinfo($_FILES['content']['name']);
   $fileExtension = $fileInfo['extension'];
   $fileName = hash('sha1', microtime(true).$_FILES['content']['tmp_name']).'.'.$fileExtension;

   if(in_array($_FILES['content']['type'], $allowedTypes)) {
     if(move_uploaded_file($_FILES['content']['tmp_name'], $postDir.$fileName)) {

       $dbPath = "/app/data/posts/$fileName";

       $statement = $pdo->prepare('INSERT INTO posts (user_id, content, caption) VALUES (:user_id, :content, :caption)');

       if(!$statement) {
         die(var_dump($pdo->errorInfo()));
       }

       $statement->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_STR);
       $statement->bindParam(':content', $dbPath, PDO::PARAM_STR);
       $statement->bindParam(':caption', $caption, PDO::PARAM_STR);
       $statement->execute();
     }
    }
}

redirect('/');
