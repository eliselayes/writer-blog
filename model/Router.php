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
                
                if($_GET['action']== 'changePage') {
                    if(isset($_GET['page'])) {
                        $controler_frontend->changePage($_GET['page']);
                    }
                }
                elseif ($_GET['action'] == 'login') {
                        $controler_backend->displayLogin();
                }
                elseif ($_GET['action'] == 'mainBackend') {
                    if (!empty($_POST['pass']) && !empty($_POST['pseudo'])) {
                        $controler_backend->mainBackend($_POST['pseudo'], $_POST['pass']);
                    }
                    else {
                        echo '<script>alert("Vous n\'avez pas rempli tous les champs");</script>';
                        $controler_backend->displayLogin();
                    }
                }
                elseif ($_GET['action'] == 'seeOnePost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_frontend->seeOnePost($_GET['id']);
                    }     
                }
                elseif ($_GET['action'] == 'seePostsPerMonth') {
                    if (isset($_GET['m'])) {
                        $controler_frontend->seePostsPerMonth($_GET['m']);
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
                
                elseif ($_GET['action'] == 'changePW') {
                    if(!empty($_POST['pass'])) {
                        $controler_backend->changePW($_POST['pass']);
                    }
                    else {
                        $controler_backend->displayChangePW();
                    }
                }
                elseif ($_GET['action'] == 'report') {
                    if(isset($_GET['id']) && $_GET['id'] > 0 && ($_GET['postId']) && $_GET['postId'] > 0) {
                        $controler_frontend->addReport($_GET['id'], $_GET['postId']);
                    }
                }
                elseif ($_GET['action'] == 'seeReports') {
                    $controler_backend->seeReports();
                }
                elseif ($_GET['action'] == 'keepComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_backend->keepComment($_GET['id']);
                    }
                }
                elseif ($_GET['action'] == 'deleteComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_backend->deleteComment($_GET['id']);
                    }
                }
                elseif ($_GET['action'] == 'editText') {
                    $controler_backend->listPostsEdit(1);
                }
                elseif ($_GET['action'] == 'changePageBack') {
                    if(isset($_GET['page'])) {
                        $controler_backend->changePageBack($_GET['page']);
                    }
                }
                elseif ($_GET['action'] == 'deletePost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_backend->deletePost($_GET['id'], 1);
                    }
                }
                elseif ($_GET['action'] == 'displayPostToBeUpd') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_backend->displayPostToBeUpd($_GET['id']);
                    }
                }
                elseif ($_GET['action'] == 'modifyPost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler_backend->modifyPost($_POST['content'], $_GET['id']);
                    }
                }
                  
            }
            else {
            $controler_frontend->listPosts1(1);
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

