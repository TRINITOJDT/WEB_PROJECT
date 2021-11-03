<!DOCTYPE html>
<html>
<head>
	<title>Vente téléphone en ligne</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link reel="stylesheet" href="../style.css">
</head>
<body>
<?php
 
     require('config.php');
     session_start();
     if( isset ($_POST['username'])) {
     	$username = stripslashes($_REQUEST['username']);
     	$username = mysqli_real_escape_string($conn,$username);
     	$_SESSION['username'] = $username;
     	$password = stripslashes($_REQUEST['password']);
     	$password = mysqli_real_escape_string($conn,$password);
        $query = "SELECT * FROM 'users' WHERE username ='$username' and password ="'.hash('sha256',$password).'"";
     	$resultat = mysqli_query($conn,$query) or (mysqli_error());
     	$rows = mysqli_num_rows($resultat);
     	if($rows == 1) {
     		$_SESSION['username'] = $username;
     		header("Location : index.php");
     	} else {
     		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
     	}
     }
?>     
<form class="box" action="" method="post" name="login">
	<h1 class="box-logo box-title">
		<a  style="color:;position:relative; left:220px;bottom:10px;"href="../index.html">Phonemobile.com</a></h1>
		<h1 clas="" style="color:red;text-align:center;margin-bottom:40px;">CONNEXION</h1>
		<p style="color:green;font-family:arial black;"><marquee>Connectez-vous d'abord avant d'acheter le téléphone.</marquee></p>
		<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required>
		<input type="password" class="box-input" name="password" placeholder="Mot de passe">
		<input type="submit" value="Connexion" name="submit" class="box-button"><br/><br/>
		<p class="box-register">Vous êtes nouveau ici ? <a href="register.php">Inscrivez-vous ici</a></p><br/>
		 <footer class="container">
        <p class="float-right" style="color:black;"><a href="../index.html">Rétour à l'accueil</a></p>
        <p> Copyright 2020 &copy; PhoneMobile, Inc. &middot; <a href="politique.html">Politique de confidentialité </a> &middot; <a href="mention.html">Mentions légales </a></p>
      </footer>
<?php if(!empty($message)) { ?>

	<p class="errorMessage"> <?php 
	echo $message; ?> </p>
<?php } ?>
}
</form> 
</body>
</html>