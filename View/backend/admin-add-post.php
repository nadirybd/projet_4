<div id="add-post">
	<h1>Ajoutez un nouvel article</h1>
	
	<form id="add-post-form" method="post">
		<p>
			<label for="title">Titre :</label><br/>
			<input type="text" name="addTitle" id="title"/>
		</p>
		
		<p>Contenu de l'article :</p>
		<textarea id="mytextarea" cols="50" rows="30" name="addContent"></textarea>

		<p><input type="submit" name="add" value="Ajouter"/></p>
	</form>
	
	<p>
		<a href="index.php?p=admin"><i class="fas fa-cog"></i> Revenir à l'administration général</a>
	</p>
</div>