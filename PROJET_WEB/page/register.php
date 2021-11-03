<!DOCTYPE html>
<html>
<head>
	<title>Vente téléphone en ligne</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
     require('config.php');
if(isset($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['password'])) {

	//recuperer le nom d'utilisateur et supprimer les antislashes 
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn,$username);

	//recuperer l'email et supprimer les antislashes
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn,$email);

	//recuperer le mot de passe et supprimer les antislashes
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);

	$query = "INSERT into 'users' (username,email,type,password) VALUES ('$username','$email','user', '.hash('sha 256', $password).')";

	//executer la requete sur la base de donnée
	$res = mysqli_query($conn,$query);
	if ($res) {
		echo "<div class='sucess'>
		<h3>Vous etes inscritavec succès.</h3>
		<p>Cliquez ici pour vous<a href='login.php'>Connecter</a></p></div>";
	}
	} else {

?>

<form class="box" action="" method="post" >
	<h1 class="box-logo box-title">
		<a  style="color:;position:relative; left:220px;bottom:10px;"href="../index.html">Phonemobile.com</a></h1>
		<h1 clas="" style="color:red;text-align:center;margin-bottom:40px;">INSCRIPTION</h1>
		<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required/>
	    <input type="text" class="box-input" name="Email" placeholder="Email" required/>
		<input type="password" class="box-input" name="password" placeholder="Mots de passe" required/>
		<input type="submit" name="submit" value="S'inscrire" class="box-button"/><br/><br/>
		<p class="box-register">Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p><br/>
		<footer class="container">
        <p class="float-right" style="color:black;"><a href="../index.html">Rétour à l'accueil</a></p>
        <p> Copyright 2020 &copy; PhoneMobile, Inc. &middot; <a href="politique.html">Politique de confidentialité </a> &middot; <a href="mention.html">Mentions légales </a></p>
        </footer>
</form>
<?php } ?>
</body>
</html>