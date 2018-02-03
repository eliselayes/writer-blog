<?php

namespace OpenClassrooms\Blog\Model;

require_once('./index.php');
require_once('Frontend.php');
require_once('Backend.php');

class Router 
{
    public function direct()
    {
        try {
            $controler_frontend = new Frontend();
            $controler_backend = new Backend();

            
            if (isset($_GET['action'])) { 
                if($_GET['action']== 'listPosts') {
                    if(isset($_GET['p']) && $_GET['p']<=$totalPages) {
                        $controler_frontend->listPostsOtherPages();
                    }
                }
                elseif ($_GET['action'] == 'login') {
                    if(!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                        $controler_backend->login($_POST['pseudo'], $_POST['pass']);
                    }
                    else {
                        $controler_backend->displayLogin();
                    }
                }
                elseif ($_GET['action'] == 'seeOnePost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_frontend->seeOnePost($_GET['id']);
                    }
                    
                }
                elseif ($_GET['action'] == 'sendText') {
                    if(!empty($_POST['content'])) {
                        $controler_backend->sendText($_POST['content']);
                    }
                    else {
                        $controler_backend->displaySendText();
                    }
                }
                elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $controler_frontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            $controler_frontend->displayAddComment();
                        }
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'mainBackend') {
                    $controler_backend->mainBackend();
                }
                elseif ($_GET['action'] == 'report') {
                    $controler_frontend->addReport($_GET['id'], $_GET['postId']);
                }
                elseif ($_GET['action'] == 'seeReports') {
                    $controler_backend->seeReports();
                }

                elseif ($_GET['action'] == 'keepComment') {
                    $controler_backend->keepComment($_GET['id']);
                }
                elseif ($_GET['action'] == 'deleteComment') {
                    $controler_backend->deleteComment($_GET['id']);
                }
            }
            else {
                $controler_frontend->listPosts1();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

