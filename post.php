<?php require __DIR__.'/views/header.php'; ?>

  <section>
    <div class="container2">
      <div class="login-form">
        <h1>Upload</h1>
        <form action="app/posts/store.php" method="post" enctype="multipart/form-data">
          <input class="" type="file" name="image">
          <input class="" type="text" name="caption" required>
          <input type="submit" name="" value="Upload">
        </form>
      </div>
    </div>
  </section>

<?php require __DIR__.'/views/footer.php'; ?>
