<?php

if (isset($_POST['envoi']))
{
	if(!empty($_POST['email']))
	{
		if(!empty($_POST['motdepasse']))
		{
			$mail=$_POST['email'];
			$pass=sha1($_POST['motdepasse']);
			$bdd= new PDO("mysql:host=localhost;dbname=trinito",'root','');
			$requete=$bdd->prepare('SELECT * FROM inscription WHERE email=? AND mot_de_passe=?'); 
			$requete->execute(array($mail,$pass));
			$user=$requete->rowcount();
			if($user==1)
			{
				session_start();
				include('monpaguni.php');
				exit();
			}
			else
			{
				echo 'Mauvaise identifiant ou mot de passe';
			}
				
		}
		else
		{
			echo 'votre mot de passe ne doit pas etre vide';
		}
	}
	else
	{
		echo 'Vous devez remplir votre email';
	}
}
?>





 <html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="nito.css"/>
		<title>TRINITO@WEB</title>
	</head>
	<body>
        <div class="nito">
            <form method="post" >
                <fieldset>
                    <label>IDENTIFICATION<br/><br/>

                    <label for="email">votre e-mail</label><br/>
                    <input type="text" name="email" id="email"/><br/><br/>
                    <label for="motdepasse">votre mot de passe</label><br/>
                    <input type="password" name="motdepasse" id="motdepasse"/><br/><br/>
                    <input name="envoi" type="submit" id="envoi" value="connexion">
                    <h5><a href="inscription.php">CREER UN NOUVEAU COMPTE</a><h5>
                    <h6><a href="pag1.php">ALLER AU PREMIER PAGE</a></h6>
                </fieldset>
            </form>
        </div>
	</body>
</html>