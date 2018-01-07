<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function postRegistration()
    {
        $db = $this->dbConnect();
        $req->execute(array($_POST['pseudo'], $pass_hache, $_POST['email']));

        return $req;
    }

}