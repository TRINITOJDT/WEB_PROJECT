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

    <link rel="stylesheet" media="screen" href="cv.css" />
    <script src="jquery-3.5.1.min.js"></script>
    <script src="cv.js"></script>
</head>
<body>

    <nav id="navb" class="navbar navbar-default navbar-fixed-top">
        <div id="tr">Trinito.mg</div>
        <div id="cont" class="container">
            <div class="navbar-header">      
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#about"> Moi </a> </li>
                    <li><a href="#education"> Education </a> </li>
                    <li><a href="#experience"> Experience </a> </li>
                    <li><a href="#skills"> Competence </a> </li>
                    <li><a href="#portfolio"> portfolio </a> </li>
                    <li><a href="#contact-form"> contact </a> </li>                 
                </ul>
            </div>
        </div>
    </nav>

    <section id="about" class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-md-6 thumbnail0">
                <div class="heading">
                    <h1>Hello, c'est moi Trinito</h1>
                    <h3>Developpeur Web</h3>
                    <a href="docs/cv.pdf" id="bouton1" class="button">Telecharger cv</a>
                </div>
                
            </div>
            <div class="col-xs-6 col-md-6 profile-picture">
                <img src="images/trinito.jpg" alt="trinito" class="img-circle">           
            </div>
            <div class="col-xs-6 col-md-6 thumbnail1">
                <div class="heading">
                    <h1>Hello, c'est moi Trinito</h1>
                    <h3>Developpeur Web</h3>
                    <a href="docs/cv.pdf" id="bouton1" class="button">Telecharger cv</a>
                </div>
                
            </div>
        </div>
    </section> 
    
    <section id="education">
        <div class="container"> 
            <div class="red-divider"></div>
            <div class="heading">
                <h2>EDUCATION</h2>              
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div id="education-block1" class="education-block">
                        <h5>2002-2006</h5>
                        <span class="glyphicon glyphicon-education"></span>
                        <h3>Ecole polytechnique PARIS</h3>
                        <h4>Ingenierie informatique</h4>
                        <div class="red-divider"></div>
                        <p>Inteligence Artificiel</p>
                        <p>System d'Information</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div id="education-block2" class="education-block">
                        <h5>2007</h5>
                        <span class="glyphicon glyphicon-education"></span>
                        <h3>Apprendre-a-coder.com</h3>
                        <h4>Formation online "developpeur web"</h4>
                        <div class="red-divider"></div>
                        <p>HTML/CSS, Javascript, Jquery</p>
                        <p>Responsive design</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="experience">
        <div class="container">
            <div class="white-divider"></div>
            <div class="heading">
                <h2>Experience profesionnel</h2>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"><span class="glyphicon glyphicon-briefcase"></span> </div>
                    <div id="tml1" class="timeline-panel-container">
                        <div id="tml11" class="timeline-panel">
                            <div class="timeline-heading">
                                <h3>GOOGLE</h3>
                                <h4>Developpeur web senior</h4>
                                <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 2013-2015</p>
                            </div>
                            <div class="timeline-body">                               
                                <p>Ajout de la possibilité d'écouter une traduction dans Google Translate </p>
                                <p>Développement de Google Suggest en mode Offline </p>
                                <p>Nouveau design du player de Youtube adapté au mobile </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><span class="glyphicon glyphicon-briefcase"></span> </div>
                    <div id="tml2" class="timeline-panel-container-inverted">
                        <div id="tml22" class="timeline-panel">
                            <div class="timeline-heading">
                                <h3>FACEBOOK </h3>
                                <h4>Développeur Web </h4>
                                <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 2010-2013</p>
                            </div>
                            <div class="timeline-body">                               
                                <p>Développement du bouton Share pour les applis Web mobile </p>
                                <p>Lancement automatique des vidéos en mode mute depuis la Timeline </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><span class="glyphicon glyphicon-briefcase"></span> </div>
                    <div id="tml3" class="timeline-panel-container">
                        <div id="tml33" class="timeline-panel">
                            <div class="timeline-heading">
                                <h3>TWITTER  </h3>
                                <h4>Développeur Web Junior </h4>
                                <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 2007-2010</p>
                            </div>
                            <div class="timeline-body">                               
                                <p>Création et Développement du Retweet pour l'appli Web </p>
                                <p>Intégration des vidéos sur les applis web mobile </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section> 

    <section id="skills">
        <div class="red-divider"></div>
        <div class="heading">
            <h2>Competence</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="progress pro1">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                            <h5>HTML 85%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <h5>CSS 80%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <h5>BOOTSTRAP 70%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <h5>JAVASCRIPT 70%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                            <h5>JQUERY 75%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                            <h5>PHP 75%</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio">
        <div class="container">
            <div class="white-divider"></div>
            <div class="heading">
                <h2>PORTFOLIO</h2>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <a class="thumbnail" href="http://www.facebook.com" target="_blank">
                        <img src="images/facebook.png" alt="facebook shared">
                    </a>
                </div>
                <div class="col-sm-4 col-md-4">
                    <a class="thumbnail" href="http://www.google.com" target="_blank">
                        <img src="images/google.png" alt="google Translate">
                    </a>
                </div>
                <div class="col-sm-4 col-md-4">
                    <a class="thumbnail" href="http://www.twitter.com" target="_blank">
                        <img src="images/20.8 twitter_retweet.png.png" alt="twitter Translate">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <a class="thumbnail" href="http://www.Youtube.com" target="_blank">
                        <img src="images/youtube.png" alt="Youtube Translate">
                    </a>
                </div>
                <div class="col-sm-4 col-md-4">
                    <a class="thumbnail" href="http://www.twitter.com" target="_blank">
                        <img src="images/twiter.png" alt="twitter video">
                    </a>
                </div>
                <div class="col-sm-4 col-md-4">
                    <a class="thumbnail" href="http://www.facebook.com" target="_blank">
                        <img src="images/20.9 facebook_video.png.png" alt="facebook video">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-form">
        <div class="white-divider"></div>
        <div class="heading">
            <h2>contact</h2>
        </div>
        <div id="contact" class="container">
            <div class="row">
                <div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                    <form id="panel-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <label for="nom">NOM <span class="etoil">*</span></label>
                                <input type="text" id="nom" name="nom" class="form-control inp" placeholder="votre nom">
                                <p class="comment"><?php echo $nomError ?></p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label for="prenom">PRENOM <span class="etoil">*</span></label>
                                <input type="text" id="prenom" name="prenom" class="form-control inp" placeholder="votre prenom">
                                <p class="comment"><?php echo $prenomError ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <label for="phone">TELEPHONE <span class="etoil">*</span></label>
                                <input type="tel" id="phone" name="phone" class="form-control inp" placeholder="votre numero">
                                <p class="comment"><?php echo $phoneError ?></p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label for="email">EMAIL <span class="etoil">*</span></label>
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
                                <a href="#contact-form"><input type="submit" class="bouton1" value="envoyer"></a>
                                <p class="remerciement" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>">Votre commentaire a bien ete envoye, merci de m'avoir contacter !!!</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <a href="#about"><span class="glyphicon glyphicon-chevron-up"></span> </a>
        <h5>Trinito | Copyright 2020 | Tous droits resérvés</h5>
    </footer>
    
</body>
</html>


























