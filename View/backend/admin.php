<h1>Mon administration</h1>
<section id="admin-page">
	<aside>
			<p><a href="index.php?p=admin.posts">Modifier les articles</a></p>
			<p><a href="">Ajouter un article</a></p>
			<p><a href="">Gérez votre compte</a></p>
	</aside>

	<table>
		<thead>
			<tr>
				<td>Nombre de report</td>
				<td>Pseudo</td>
				<td>Commentaire</td>
				<td>Action</td>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($comments as $comment): ?>
				<tr>
					<td><?= $comment->report_id; ?></td>
					<td><?= $comment->pseudo; ?></td>
					<td><?= $comment->comment; ?></td>
					<td>
						<form class="delete" method="post">
							<input type="hidden" name="delete" value="<?= $comment->id; ?>" />
							<input type="submit" name="send_delete" value="Supprimer" />
						</form>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</section>