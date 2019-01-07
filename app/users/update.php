<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_SESSION['user']['username'])){
  $email = $_SESSION['user']['username'];
  $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
  // $statement = $pdo->prepare('SELECT * FROM users');
  if(!$statement){
    die(var_dump($pdo->errorInfo()));
  }
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->execute();
  $currentusers = $statement->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['username'], $_POST['name'], $_POST['email'], $_POST['password'])) {
  $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $id = $_SESSION['user']['id'];


  $query = "UPDATE users SET username = :username, name = :name, email = :email, password = :password WHERE id = :id";
  // $query = "UPDATE users SET name = :name WHERE id = :id";

  $statement = $pdo->prepare($query);

    if (!$statement) {
      die(var_dump($pdo->errorInfo()));
    }


  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':name', $name, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $password, PDO::PARAM_STR);

  $statement->execute();

}

redirect('/');
