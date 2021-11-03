<?php
//initialiser la session
session_start();

//verifier si l'utilisateur est connecté,sinon rediger-le vers la page de connexion
if(!isset($_SESSION["username"])) {
	header("Location : login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="sucess">
		<h1> Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<p>C'est votretableau de bord</p>
		<a href="logout.php">Déconnexion</a>
	</div>
</body>
</html>