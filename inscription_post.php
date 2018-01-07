<?php

//setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true); // cookie pour enregistrer le pseudo

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


// Vérification de la validité des informations

// Hachage du mot de passe
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$pseudo;
$email;

if (isset($_POST['pseudo']) AND isset($_POST['pass']) AND isset($_POST['email']))
{
        // Insertion
        $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, CURDATE())');
        $req->execute(array($_POST['pseudo'], $pass_hache, $_POST['email']));

}
else
{
        echo 'Il faut renseigner le pseudo, l\'adresse mail et le mot de passe';
}

// Redirection du visiteur vers la page d'inscription
header('Location: connexion.php');



