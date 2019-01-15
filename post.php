<?php require __DIR__.'/views/header.php'; ?>

<form action="app/posts/store.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="content">Select</label>
        <input class="form-control" type="file" name="content">
    </div><!-- /form-group -->

    <div class="form-group">
      <label for="caption">Caption</label>
      <input class="form-control" type="text" name="caption" required>
      <small class="form-text text-muted"></small>
    </div>

    <button type="submit" class="btn btn-primary">Post</button>

  </form>


<?php require __DIR__.'/views/footer.php'; ?>
