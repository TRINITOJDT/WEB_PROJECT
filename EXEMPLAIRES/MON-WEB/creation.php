<?php

		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$pass=sha1($_POST['password']);
		
		$bdd= new PDO("mysql:host=localhost;dbname=trinito",'root','');
		
		$bdd-> exec("INSERT INTO inscription (nom,prenom,email,password) VALUES ('$nom','$prenom','$email','$pass')");
	?>