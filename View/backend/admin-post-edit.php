<div id="edit-selected">
	<h1>Editez votre article</h1>

	<form id="edit-form" method="post">
		<p>
			<input type="text" name="title" value="<?= $post->title; ?>" />
		</p>
		<p>
			<input type="hidden" name="id" value="<?= $post->id; ?>" />
		</p>
		<textarea id="mytextarea" cols="50" rows="30" name="content"><?= $post->content; ?></textarea>

		<p><input type="submit" name="edit" /></p>
	</form>
</div>