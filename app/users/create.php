<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['username'], $_POST['fullname'], $_POST['email'], $_POST['password'])) {
  $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
  $fullName = filter_var(trim($_POST['fullname']), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


  $query = "INSERT INTO users (username, fullname, email, password) VALUES(:username, :fullName, :email, :password)";

    // INSERT INTO users (username, fullname, email, password) VALUES ('test', 'samuel', 'samuel0911@hotmail.com', '12345');
    $statement = $pdo->prepare($query);

    if (!$statement) {
      die(var_dump($pdo->errorInfo()));
    }



  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':fullName', $fullName, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $password, PDO::PARAM_STR);

  $statement->execute();

  redirect('/');
}
