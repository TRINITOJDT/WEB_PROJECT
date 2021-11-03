<?php
    $nom = $prenom = $phone = $email = $coms = ' ';
    $nomError = $prenomError = $phoneError = $emailError = $comsError = ' ';
    $isSuccess = false;
    $mailTo = "jeandenistrinito@gmail.com";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nom = verifyInput($_POST["nom"]);
        $prenom = verifyInput($_POST["prenom"]);
        $phone = verifyInput($_POST["phone"]);
        $email = verifyInput($_POST["email"]);
        $coms = verifyInput($_POST["coms"]);
        $isSuccess = true;
        $mailText = " ";

        if(empty($nom))
        {
            $nomError = "Quel est votre nom ???";
            $isSuccess = false;
        }
        else
        {
            $mailText .= "Name : $nom\n";
        }

        if(empty($prenom))
        {
            $prenomError = "Quel est votre prenom ???";
            $isSuccess = false;
        }
        else
        {
            $mailText .= "Lastname : $prenom\n";
        }

        if(!isPhone($phone))
        {
            $phoneError = "Entrez le bon numero !!!";
            $isSuccess = false;
        }
        else
        {
            $mailText .= "Phone : $phone\n";
        }

        if(!isEmail($email))
        {
            $emailError = "Votre email n'est pas valide !!!";
            $isSuccess = false;
        }
        else
        {
            $mailText .= "Email : $email\n";
        }

        if(empty($coms))
        {
            $comsError = "Qu'est ce que vous voulez dire ???";
            $isSuccess = false;
        }
        else
        {
            $mailText .= "Message : $coms\n";
        }

        if($isSuccess)
        {
            $headers ="From : $nom $prenom <$email>\t\n Reply-To : $email"; 
            mail($mailTo, "votre message", $mailText, $headers);
            $nom = $prenom = $phone = $email = $coms = ' ';
        }
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



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="formulaire.css" />
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                <form id="panel-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="nom">NOM <span>*</span></label>
                            <input type="text" id="nom" name="nom" class="form-control inp" placeholder="votre nom">
                            <p class="comment"><?php echo $nomError ?></p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="prenom">PRENOM <span>*</span></label>
                            <input type="text" id="prenom" name="prenom" class="form-control inp" placeholder="votre prenom">
                            <p class="comment"><?php echo $prenomError ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="phone">TELEPHONE <span>*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control inp" placeholder="votre numero">
                            <p class="comment"><?php echo $phoneError ?></p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="email">EMAIL <span>*</span></label>
                            <input type="email" id="email" name="email" class="form-control inp" placeholder="votre email">
                            <p class="comment"><?php echo $emailError ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label for="coms">COMMENTAIRE</label>
                            <textarea type="text" id="coms" name="coms" class="form-control com" placeholder="votre commentaire" rows="6"></textarea>
                            <p class="comment"><?php echo $comsError ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <input type="submit" class="bouton1" value="envoyer">
                            <p class="remerciement" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>">Votre commentaire a bien ete envoye, merci de m'avoir contacter !!!</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>