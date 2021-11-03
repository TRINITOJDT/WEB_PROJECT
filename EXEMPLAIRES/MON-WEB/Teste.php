<?php

    //$nom=$_POST['nom'];
    //$prenom=$_POST['prenom'];
    //$email=$_POST['email'];
    //$pass=sha1($_POST['motdepasse']);

    $database = new PDO('mysql:host=localhost;dbname=trinito','root','');
    //$database->query("INSERT INTO inscription(nom, prenom, email, mot_de_passe) VALUE ('MAVERA','Raissa','raissa@gmail.com','0123456789')");	
    $result = $database->query('SELECT nom,prenom,email FROM inscription');
    while($row = $result->fetch())
    {
        echo "Je m'appel : " . $row['nom']." ".$row['prenom']."<br> "."mon email : ".$row['email']."<br><br>";
    }
?>

