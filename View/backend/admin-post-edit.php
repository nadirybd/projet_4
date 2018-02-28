<div id="edit-selected">
	<h1>Editez votre article</h1>

	<form id="edit-form">
		<p>
			<input type="text" name="title" value="<?= $post->title; ?>" />
		</p>
		<textarea id="mytextarea" cols="50" rows="30" name="content"><?= $post->content; ?></textarea>

		<p><input type="submit" name="edit" /></p>
	</form>
</div>