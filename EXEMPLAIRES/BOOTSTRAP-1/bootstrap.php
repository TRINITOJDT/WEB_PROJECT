<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="name">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="valider" value="valider">
    </form><br>
    <!--  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <?php
    if(isset($_POST['valider']))
    {
        if(isset($_POST['name']))
        {
            if(isset($_POST['password']))
            {
                if(!empty($_POST['name']) AND !empty($_POST['password']))
                {
                    echo "Ton nom est : ".$_POST['name'];
                    echo "<br/>";
                    echo "Et ton mot de passe : ".$_POST['password'];
                }
                else
                {
                    echo "Veillez completer tous les champs d'abord";
                }
            }            
        }
    }
    ?>
    <!--  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
</body>
</html>

