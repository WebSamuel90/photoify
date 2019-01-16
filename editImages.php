<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';

?>

<form action="app/posts/edit.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="caption">Caption</label>
      <input class="form-control" type="text" name="caption" required>
      <small class="form-text text-muted"></small>
    </div>

    <button type="submit" class="btn btn-primary">Post</button>

  </form>

<?php require __DIR__.'/views/footer.php'; ?>
