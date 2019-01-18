<?php require __DIR__.'/views/header.php'; ?>

<form class="" action="app/posts/store.php" method="post" enctype="multipart/form-data">
	<div class="card mx-auto" style="width: 24rem;">
		<ul class="list-group list-group-flush">
			<div class="card-body">
				<h5 class="card-title">Create new Post</h5>
					<p class="card-text">Post an image:<input type="file" name="image" value=""></p>
					</p>
					</div>
				<li class="list-group-item">Say something:<input type="text" name="caption" placeholder="Caption" value=""></li>
		</ul>

		<div class="card-body">
			<button class="btn btn-success" type="submit" name="button">Submit Post</button>
		</div>
	</div>
</form>

<?php require __DIR__.'/views/footer.php'; ?>
