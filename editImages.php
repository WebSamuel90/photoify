<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';

?>

  <section>
    <div class="container2">
      <div class="login-form">
        <h1>Update</h1>
        <form action="app/posts/edit.php" method="post" enctype="multipart/form-data">
          <textarea class=""  name="caption" required>
          <input type="submit" name="" value="Update">
        </form>
      </div>
    </div>
  </section>

<?php require __DIR__.'/views/footer.php'; ?>
