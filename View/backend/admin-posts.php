<div id="admin-post">
	<h1>Gestionnaires des articles</h1>
	
	<p>
		<a href="index.php?p=admin"><i class="fas fa-cog"></i> Revenir à l'administration général</a>
	</p>

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
							<p>
								<input type="hidden" name="delete" value="<?= $post->id; ?>" />
								<input type="submit" name="send_delete" value="Supprimer" />
							</p>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p>
		<?php for($page=1; $page<=$number_of_pages; $page++): ?>
			<?php if($page == $current_page): ?>
				<span><?= $page; ?></span>
			<?php else: ?>
			<a href="index.php?p=admin.posts&page=<?= $page; ?>">
				<?= $page; ?>
			</a> 
			<?php endif; ?> |
		<?php endfor; ?>
	</p>
</div>