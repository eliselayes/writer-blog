<?php

namespace OpenClassrooms\Blog\Model;

require_once('./index.php');
require('controler/frontend.php');

class Router 
{
    public function direct()
    {
        try {
            if (isset($_GET['action'])) { 
                if ($_GET['action'] == 'login') {
                    if(!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                        login($_POST['pseudo'], $_POST['pass']);
                    }
                    else {
                        displayLogin();
                    }
                }
                /*elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        post();
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }*/
                elseif ($_GET['action'] == 'sendText') {
                    if(!empty($_POST['content'])) {
                        sendText($_POST['content']);
                    }
                    else {
                        displaySendText();
                    }
                }
            }
            else {
                listPosts();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

