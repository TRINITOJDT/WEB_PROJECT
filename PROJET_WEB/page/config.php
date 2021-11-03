<?php

//Informatios d'indetification
difine('DB_SERVER','localhost');
difine('DB_USERNAME','root');
difine('DB_PASSWORD','');
difine('DB_NAME','registration');

//Connexion à la base de donnée MySQL
$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

//Verifier la connexion
if($conn === false) {
	die("ERREUR : Impossible de se connecter.".mysqli_connect_error());
}

?>