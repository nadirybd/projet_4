<div id="edit-selected">
	<h1>Editez votre article</h1>

	<form id="edit-form" method="post">
		<p>
			<label for="edit-title">Titre :</label><br/>
			<input type="text" name="title" value="<?= $post->title; ?>" />
		</p>
		<p>
			<input type="hidden" name="id" value="<?= $post->id; ?>" />
		</p>
		<p>Contenu de l'article :</p>
		<textarea id="mytinymce" cols="50" rows="30" name="content"><?= $post->content; ?></textarea>

		<p><input type="submit" name="edit" value="Mettre à jour"/></p>
	</form>

	<p>
		<a href="index.php?p=admin.posts"><i class="fas fa-cog"></i> Revenir à l'administration des articles</a>
	</p>
</div>