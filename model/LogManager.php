<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class LogManager extends Manager
{
    public function login($pseudo, $pass)
    {
        // Verification des identifiants
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id FROM authors WHERE pseudo = :pseudo AND pass = :pass');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass));
        
        $resultat = $req->fetch();
        
        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            echo 'Vous êtes connecté !';
        }


        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo 'Bonjour ' . $_SESSION['pseudo'];
        }
    }
}