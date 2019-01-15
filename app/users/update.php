<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if ($isLoggedIn && isset($_SESSION['user']['username'])){

  $id = $_SESSION['user']['id'];

  $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');

  if(!$statement){
    die(var_dump($pdo->errorInfo()));
  }
  $statement->bindParam(':username', $_SESSION['user']['username'], PDO::PARAM_STR);
  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);

  // Profile Picture update
  if(isset($_FILES['profile_pic'])){
    $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];

    $postDir = __DIR__."/../data/avatars/";

    $fileInfo = pathinfo($_FILES['profile_pic']['name']);
    $fileExtension = $fileInfo['extension'];
    $fileName = hash('sha1', microtime(true).$_FILES['profile_pic']['tmp_name']).'.'.$fileExtension;

    if(in_array($_FILES['profile_pic']['type'], $allowedTypes)){
      if(move_uploaded_file( $_FILES['profile_pic']['tmp_name'], $postDir.$fileName)) {

        $dbPath = "/app/data/$postDir.$fileName";

        $statement = $pdo->prepare('UPDATE users SET profile_pic_url = :profile_pic_url WHERE id = :id');

        if(!$statement){
          die(var_dump($pdo->errorInfo()));
        }
        
        $statement->bindParam(':profile_pic_url', $dbPath, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
      }
    }
  }

  // Username update
  if(isset($_POST['username']) && $_POST['username'] !== $user['username']) {
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);

    $statement = $pdo->prepare("UPDATE users SET username = :username WHERE id = :id");
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['messages'][] = "Your username has been updated!";
  }

  // Name update
  if(isset($_POST['name']) && $_POST['name'] !== $user['name']) {
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);

    $statement = $pdo->prepare("UPDATE users SET name = :name WHERE id = :id");
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['messages'][] = "Your name has been updated!";
  }

    //Email update
    if(isset($_POST['email']) && $_POST['email'] !== $user['email']) {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        $statement = $pdo->prepare("UPDATE users SET email = :email WHERE id = :id");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $_SESSION['messages'][] = "Your email has been updated!";
  }

    //Password update
    if(isset($_POST['new-password']) && $_POST['password'] && $_POST['password'] !== "") {
      if($_POST['new-password'] === $_POST['password'] && $_POST['password'] === "") {

        $_SESSION['messages'][] = "You cannot use the same password again.";
        redirect('/update.php');

      } elseif(password_verify($_POST['password'], $user['password'])) {
        $newPassword = password_hash($_POST['new-password'], PASSWORD_DEFAULT);

        $statement = $pdo->prepare("UPDATE users SET password = :newPassword WHERE id = :id");
        $statement->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $_SESSION['messages'][] = "Your password has been updated!";
      } else {
          $_SESSION['error']['message'] = "Wrong password!";
          redirect("/update.php");
        }
    }
}

// Update session
$statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_STR);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

$_SESSION['user'] = [
  'id' => $user['id'],
  'name' => $user['name'],
  'username' => $user['username'],
  'email' => $user['email']
];

redirect('/');
