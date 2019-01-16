<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if($isLoggedIn && isset($_FILES['image'], $_POST['caption'])) {
   $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];

   $caption = filter_var(trim($_POST['caption']),FILTER_SANITIZE_STRING);

   $postDir = __DIR__."/../data/posts/";

   $fileInfo = pathinfo($_FILES['image']['name']);
   $fileExtension = $fileInfo['extension'];
   $fileName = hash('sha1', microtime(true).$_FILES['image']['tmp_name']).'.'.$fileExtension;

   if(in_array($_FILES['image']['type'], $allowedTypes)) {
     if(move_uploaded_file($_FILES['image']['tmp_name'], $postDir.$fileName)) {

       $dbPath = "/app/data/posts/$fileName";

       $statement = $pdo->prepare('INSERT INTO posts (user_id, image, caption) VALUES (:user_id, :image, :caption)');

       if(!$statement) {
         die(var_dump($pdo->errorInfo()));
       }

       $statement->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_STR);
       $statement->bindParam(':image', $dbPath, PDO::PARAM_STR);
       $statement->bindParam(':caption', $caption, PDO::PARAM_STR);
       $statement->execute();
     }
    }
}

redirect('/');
