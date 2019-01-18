<?php

declare(strict_types=1);

require __DIR__.'/views/header.php'; ?>

<article>
  <h1>Update</h1>

  <form action="app/posts/edit.php" method="post">
    <div class="form-group">
        <label for="caption">Caption</label>
        <input class="form-control" type="text" name="caption" id="caption">
    </div><!-- /form-group -->

      <button type="submit" class="btn btn-primary">Update</button>
  </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
