<?php

namespace OpenClassrooms\Blog\Model;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/LogManager.php');
require_once('model/CommentManager.php');

class Backend extends Manager
{
    private $_postmanager;
    private $_logManager;
    private $_commentManager;

    public function __construct()
    {
        $this->_postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $this->_logManager = new \OpenClassrooms\Blog\Model\LogManager();
        $this->_commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    }



    public function login($pseudo, $pass)
    {
        $this->_logManager->login($pseudo, $pass);
        require('view/frontend/logView.php');
    }

    public function displayLogin()
    {
        require('view/frontend/logView.php');
    }




    public function sendText($content)
    {
        $this->_postManager->sendText($content);
        echo '<script>alert("Votre texte a bien été envoyé");</script>';

        require('view/backend/tinymceView.php');
    }

    public function displaySendText()
    {
        require('view/backend/tinymceView.php');
    }


    public function mainBackend()
    {
        require('view/backend/mainBackendView.php');
    }


    public function seeReports()
    {
        $repoComments = $this->_commentManager->getRepComments();
        require('view/backend/reportsView.php');
    }

    public function keepComment($id)
    {
        $repoComment = $this->_commentManager->deleteRepComFromPage($id);

        $repoComments = $this->_commentManager->getRepComments(); // rappel des commentaires signalés pour réafficher la page

        require('view/backend/reportsView.php');
    }

    public function deleteComment($id)
    {
        $this->_commentManager->deleteCom($id);
        echo '<script>alert("Le commentaire a bien été supprimé");</script>';

        $repoComments = $this->_commentManager->getRepComments(); // rappel des commentaires signalés pour réafficher la page
        require('view/backend/reportsView.php');
    }

    
}