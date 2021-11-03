<?php

    $array = array("nom" => "","prenom" => "","phone" => "","email" => "","coms" => "","nomError" => "",
    "prenomError" => "","phonError" => "","emailError" => "","comsError" => "","isSuccess" => false);
    
    $mailTo = "jeandenistrinito@gmail.com";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array["nom"] = verifyInput($_POST["nom"]);
        $array["prenom"] = verifyInput($_POST["prenom"]);
        $array["phone"] = verifyInput($_POST["phone"]);
        $array["email"] = verifyInput($_POST["email"]);
        $array["coms"] = verifyInput($_POST["coms"]);
        $array["isSuccess"] = true;
        $mailText = " ";

        if(empty($array["nom"]))
        {
            $array["nomError"] = "Quel est votre nom ???";
            $array["isSuccess"] = false;
        }
        else
        {
            $mailText .= "Name : {$array["nom"]}\n";
        }

        if(empty($array["prenom"]))
        {
            $array["prenomError"] = "Quel est votre prenom ???";
            $array["isSuccess"] = false;
        }
        else
        {
            $mailText .= "Lastname : {$array["coms"]}\n";
        }

        if(!isPhone($array["phone"]))
        {
            $array["phoneError"] = "Entrez le bon numero !!!";
            $array["isSuccess"] = false;
        }
        else
        {
            $mailText .= "Phone : {$array["phone"]}\n";
        }

        if(!isEmail($array["eamil"]))
        {
            $array["emailError"] = "Votre email n'est pas valide !!!";
            $array["isSuccess"] = false;
        }
        else
        {
            $mailText .= "Email : {$array["email"]}\n";
        }

        if(empty($array["coms"]))
        {
            $array["comsError"] = "Qu'est ce que vous voulez dire ???";
            $array["isSuccess"] = false;
        }
        else
        {
            $mailText .= "Message : {$array["coms"]}\n";
        }

        if($array["isSuccess"])
        {
            $headers ="From : {$array["nom"]} {$array["prenom"]} <{$array["email"]}>\t\n Reply-To : {$array["email"]}"; 
            mail($mailTo, "votre message", $mailText, $headers);
        }

        echo json_encode($array);
    }

    function verifyInput($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }

    function isEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/",$var);
    }

?>