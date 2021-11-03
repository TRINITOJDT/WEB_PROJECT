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
    <script src="form.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                <form id="panel-form" method="POST" action="" role="form">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="nom">NOM <span>*</span></label>
                            <input type="text" id="nom" name="nom" class="form-control inp" placeholder="votre nom">
                            <p class="comment"></p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="prenom">PRENOM <span>*</span></label>
                            <input type="text" id="prenom" name="prenom" class="form-control inp" placeholder="votre prenom">
                            <p class="comment"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <label for="phone">TELEPHONE <span>*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control inp" placeholder="votre numero">
                            <p class="comment"></p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="email">EMAIL <span>*</span></label>
                            <input type="email" id="email" name="email" class="form-control inp" placeholder="votre email">
                            <p class="comment"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label for="coms">COMMENTAIRE</label>
                            <textarea type="text" id="coms" name="coms" class="form-control com" placeholder="votre commentaire" rows="6"></textarea>
                            <p class="comment"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <input type="submit" class="bouton1" value="envoyer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>