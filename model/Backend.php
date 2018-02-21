<?php

namespace OpenClassrooms\Blog\Model;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/LogManager.php');
require_once('model/CommentManager.php');

class Backend extends Manager {
    private $_postmanager;
    private $_logManager;
    private $_commentManager;

    public function __construct() {
        $this->_postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $this->_logManager = new \OpenClassrooms\Blog\Model\LogManager();
        $this->_commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    }



    public function login() {
        $this->_logManager->login();
        require('view/frontend/logView.php');
        require('view/backend/mainBackendView.php');
    }

    public function displayLogin() {
        require('view/frontend/logView.php');
    }



    public function sendText($content) {
        $this->_postManager->sendText($content);
        echo '<script>alert("Votre texte a bien été envoyé");</script>';
        require('view/backend/tinymceView.php');
    }

    public function displaySendText() {
        require('view/backend/tinymceView.php');
    }



    public function mainBackend() {
        $donnees = $this->_logManager->getPass();
        require('view/backend/mainBackendView.php');
    }


    public function seeReports() {
        $repoComments = $this->_commentManager->getRepComments();
        require('view/backend/reportsView.php');
    }

    public function keepComment($id) {
        $repoComment = $this->_commentManager->deleteRepComFromPage($id);
        $repoComments = $this->_commentManager->getRepComments();
        require('view/backend/reportsView.php');
    }

    public function deleteComment($id) {
        $this->_commentManager->deleteCom($id);
        echo '<script>alert("Le commentaire a bien été supprimé");</script>';
        $repoComments = $this->_commentManager->getRepComments();
        require('view/backend/reportsView.php');
    }



    public function changePW($pass) {
        $this->_logManager->changePW($pass);
        echo '<script>alert("Le mot de passe a bien été modifié");</script>';
        require('view/backend/changePWView.php');
    }

    public function displayChangePW() {
        require('view/backend/changePWView.php');
    }

    public function listPostsEdit($page) {
        $totalPages = $this->_postManager->getTotalPages();
        $cPage = $this->_postManager->getCPage($page);
        $posts = $this->_postManager->getPosts();
        require('view/backend/editView.php');
    }

    public function changePageBack($page) {
        $totalPages = $this->_postManager->getTotalPages();
        $cPage = $this->_postManager->getCPage($page);
        $posts = $this->_postManager->getPosts();
        require('view/backend/editView.php');
    }

    public function deletePost($id, $page) {
        $this->_postManager->deletePost($id);
        echo '<script>alert("L\'article a bien été supprimé");</script>';
        $totalPages = $this->_postManager->getTotalPages();
        $cPage = $this->_postManager->getCPage($page);
        $posts = $this->_postManager->getPosts();
        require('view/backend/editView.php');
    }
    public function displayPostToBeUpd($content) {
        $post = $this->_postManager->getPost($content);
        require('view/backend/mceUpdateView.php');
    }
    public function modifyPost($content, $id) {
        $postToBeMod = $this->_postManager->modifyPost($content, $id);
        echo '<script>alert("L\'article a bien été modifié");</script>';
        $post = $this->_postManager->getPost($content);
        require('view/backend/mceUpdateView.php');
    }

    
}