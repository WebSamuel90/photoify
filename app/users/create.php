<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['username'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['password2'])) {

  if ($_POST['password'] !== $_POST['password2']) {
    $_SESSION['message'] = 'Please insert the same password in the fields';
    redirect('/create.php');

  } else {
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $query = "INSERT INTO users (username, name, email, password) VALUES(:username, :name, :email, :password)";

    $statement = $pdo->prepare($query);

      if (!$statement) {
        die(var_dump($pdo->errorInfo()));
      }



    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    $statement->execute();
  }
}

redirect('/');
