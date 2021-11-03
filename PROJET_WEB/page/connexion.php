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
<style>
body{
	background:#1C242d;
}
.box{
	border:1px solid #C4C4C4;
	padding:30px 25px 10px 25px;
	background:white;
	margin:30px auto;
	width:800px;
}
h1 .box-logo a{
	text-decoration:none;
}
.box-button{
	border-radius:5px;
	background:#d2483c;
	text-align:center;
	cursor:pointer;
	font-size:19px;
	width:500px;
	height:50px;
	padding:0;
	color:#fff;
	border:0;
	outline:0;
	position:relative;
	left:120px;
}
.box-register{
	text-align:center;
	margin-bottom:0px;
}
.box-register a {
	text-decoration:none;
	font-size:18px;
	color:#666;
}
.box-input{
	font-size:14px;
	background:#fff;
	border:1px solid #ddd;
	margin-bottom:40px;
	padding-left:10px;
	border-radius:5px;
	width:500px;
	height:50px;
	position:relative;
	left:120px;
}
.box-input:focus{
	outline:none;
	border-color:#5c7186;
}
.sucess{
	text-align:center;
	color:white;
}
.sucess a{
	text-decoration:none;
	color:#58aef7;
}
p .errorMessage{
	background:#e66262;
	border:#AA4502 1px solid;
	padding:5px 10px;
	color:#ffffff;
	border-radius:3px;
}
</style>

</head>
<body>
<form class="box" action="acheter.html" method="post" name="login">
	<h1 class="box-logo box-title">
		<a  style="color:;position:relative; left:220px;bottom:10px;"href="../index.html">Phonemobile.com</a></h1>
		<h1 clas="" style="color:red;text-align:center;margin-bottom:40px;">CONNEXION</h1>
		<p style="color:green;font-family:arial black;"><marquee>Connectez-vous d'abord avant d'acheter le téléphone.</marquee></p>
		<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required>
		<input type="password" class="box-input" name="password" placeholder="Mot de passe">
		<input type="submit" value="Connexion" name="submit" class="box-button"><br/><br/>
		<p class="box-register">Vous êtes nouveau ici ? <a href="inscription.php">Inscrivez-vous ici</a></p><br/>
		 <footer class="container">
        <p class="float-right" style="color:black;"><a href="../index.html">Rétour à l'accueil</a></p>
        <p> Copyright 2020 &copy; PhoneMobile, Inc. &middot; <a href="politique.html">Politique de confidentialité </a> &middot; <a href="mention.html">Mentions légales </a></p>
      </footer>
</form> 
</body>
</html>