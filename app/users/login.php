<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['username'], $_POST['password'])) {
  $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_EMAIL);

  $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");

  $statement->bindParam(':username', $username, PDO::PARAM_STR);

  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    redirect('../../login.php');
  }

  if (password_verify($_POST['password'], $user['password'])) {

    $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'username' => $user['username'],
            'email' => $user['email'],
            'profile_pic_url' => $user['profile_pic_url']
        ];
  }
}
redirect('/');
