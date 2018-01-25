<?php

namespace OpenClassrooms\Blog\Model;

require_once('./index.php');
require_once('Frontend.php');

class Router 
{
    public function direct()
    {
        try {
            $controler_frontend = new Frontend();
            if (isset($_GET['action'])) { 
                if ($_GET['action'] == 'login') {
                    if(!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                        $controler_frontend->login($_POST['pseudo'], $_POST['pass']);
                        //login($_POST['pseudo'], $_POST['pass']);
                    }
                    else {
                        $controler_frontend->displayLogin();
                    }
                }
                elseif ($_GET['action'] == 'seeOnePost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_frontend->seeOnePost($_GET['id']);
                    }
                    
                }
                elseif ($_GET['action'] == 'sendText') {
                    if(!empty($_POST['content'])) {
                        $controler_frontend->sendText($_POST['content']);
                    }
                    else {
                        $controler_frontend->displaySendText();
                    }
                }
                elseif ($_GET['action'] == 'addComment') {
                    //if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            //addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                            $controler_frontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            $controler_frontend->displayAddComment();
                        }
                    /*}
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }*/
                }
            }
            else {
                //listPosts();
                $controler_frontend->listPosts();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

