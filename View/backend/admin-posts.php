<div id="admin-post">
	<h1>Gestionnaires des articles</h1>
	
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
					<td>
						<div><?= strip_tags(substr($post->content, 0, 400)); ?></div><span> ...</span></td>
					<td>
						<p>
							<a class="button" href="index.php?p=admin.post.edit&id=<?= $post->id; ?>">Editer</a>
						</p>

						<form class="delete" method="post">
							<input type="hidden" name="delete" value="<?= $post->id; ?>" />
							<input type="submit" name="send_delete" value="Supprimer" />
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>