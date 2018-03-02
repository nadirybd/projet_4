<div id="admin-interface">
	<h1>Mon administration</h1>
	<section id="admin-page">
		<aside>
				<p><a href="index.php?p=admin.posts">Modifier les articles</a></p>
				<p><a href="index.php?p=admin.add.post">Ajouter un article</a></p>
				<p><a href="index.php?p=admin.account">Gérez votre compte</a></p>
		</aside>

		<h3>Les commentaires signalés :</h3>
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
						<td><?= htmlspecialchars($comment->pseudo); ?></td>
						<td><?= htmlspecialchars($comment->comment); ?></td>
						<td>
							<form class="pull_report" method="post">
								<input type="hidden" name="remove_report" value="<?= $comment->id; ?>" />
								<input type="submit" name="pull_report" value="Accepter" />
							</form>
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
</div>