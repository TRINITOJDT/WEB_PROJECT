
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="inscription.css"/>
		<title>S'incrire</title>
	</head>
	<body>
	<div class="nita">
		<form method="POST" action="Teste.php">
			<fieldset>
				<label>IDENTIFICATION</label><br/><br/>
				<label for="nom">votre nom</label><br/>
				<input type="texte" name="nom" id="nom"/><br/><br/>
				<label for="prenom">votre prenom</label><br/>
				<input type="text" name="prenom" id="prenom"/><br/><br/>
				<label for="email">votre e-mail</label><br/>
				<input type="text" name="email" id="email"/><br/><br/>
				<label for="motdepasse">votre mot de passe</label><br/>
				<input type="password" name="motdepasse" id="motdepasse"/><br/><br/>
				<input name="inscrire" type="submit" id="inscrire" value="inscrire">
				
				<h6><a href="nito.php">ALLER AU PREMIER PAGE</a></h6>
				<strong><a href="nito.php">RETOUR</a></strong>
			</fieldset>
		</form>
	</div>
	
	</body>
</html>