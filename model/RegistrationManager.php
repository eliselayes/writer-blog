<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class RegistrationManager extends Manager
{

    public function postRegistration($pseudo, $pass, $email)
    {
        //$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');
        $req->execute(array($pseudo, $pass, $email));

        
    }

}