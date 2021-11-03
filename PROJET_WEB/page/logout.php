<?php

//Initialiser la session 
session_start();

//Détruire le session
if(session_destroy()) {
//Redirection vers la page de connexion
	header('location : login.php');
}

?>