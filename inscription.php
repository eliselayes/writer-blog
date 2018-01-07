<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>inscription</title>
    </head>
    <style>
    form
    {
        margin: 100px;
        line-height: 3;
        
    }

    form label 
    {
        display: block;
        width: 250px;
        float: left;
        font-weight: bold;

    }

    form input 
    {
        box-shadow:
        0px 1px 1px 0px rgba(0, 0, 0, 0.5) inset,
        0px 1px 1px 0px rgba(255, 255, 255, 0.5);
    }

    </style>
    <body>
    
    <form action="inscription_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo" value="<?php echo $_COOKIE['pseudo']; ?>" /><br /> <!-- pseudo prérempli -->
        <label for="pass">Mot de passe :</label><input type="text" name="pass" id="pass" /><br />
        <label for="confirmPass">Retapez votre mot de passe :</label><input type="text" name="confirmPass" id="confirmPass" /><br />
        <label for="email">Adresse e-mail :</label><input type="text" name="email" id="email" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>



    <?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}





?>
    </body>
</html>