<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class LogManager extends Manager
{
    

    public function login($pseudo, $pass_hache)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id FROM membres WHERE pseudo = ? AND pass = ?');
        $req->execute(array($pseudo, $pass_hache));
        
        $resultat = $req->fetch();
    }
}




