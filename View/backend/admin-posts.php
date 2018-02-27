<h1>Tous vos articles :</h1>

<table>
	<thead>
		<tr>
			<td>Titre</td>
			<td>Contenu</td>
			<td>Action</td>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?= $post->title; ?></td>
				<td><?= substr($post->content, 0, 400); ?> ...</td>
				<td>
					<p><a class="button" href="index.php?p=admin.post.edit">Editer</a></p>
		
					<form method="post">
						<input type="hidden" name="delete" value="<?= $post->id; ?>" />
						<input type="submit" name="send_delete" value="Supprimer" />
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>