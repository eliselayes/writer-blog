<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class RegistrationManager extends Manager
{

    public function postRegistration()
    {
        //$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');
        $req->execute(array($_POST['pseudo'], $pass_hache, $_POST['email']));

        
    }

}