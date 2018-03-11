<div id="login">
	<h1>Connexion à l'administration</h1>
	
	<?php if($error === true): ?>
		<div class="error">Identifiant incorrect</div>	
	<?php endif; ?>

	<form id="login-form" method="post">
		<p>
			<label>Nom de l'administrateur :</label><br />
			<input type="text" name="user" required/>
		</p>
		<p>
			<label>Mot de passe :</label><br />
			<input type="password" name="pass" required/>
		</p>
		<p><button type="submit">Se connecter</button></p>
	</form>
</div>