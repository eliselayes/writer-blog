<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class LogManager extends Manager
{
    public function login() {
        $sql = 'SELECT id FROM authors WHERE pseudo = ? AND pass = ?';
        $req = $this->executeRequest($sql, array($pseudo, $pass));
        $result = $req->fetch();
    }

    public function getPass() {
        $sql = 'SELECT pass FROM authors WHERE pseudo = "jean"';
        $req = $this->executeRequest($sql, array());
        $donnees = $req->fetch();
    }

    public function changePW($pass) {
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = 'UPDATE authors SET pass = ? WHERE pseudo = "jean"';
        $req = $this->executeRequest($sql, array($pass_hash));
        $newPW = $req->fetch();
    }
}