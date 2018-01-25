<?php

namespace OpenClassrooms\Blog\Model;

// Chargement des classes

require_once('model/PostManager.php');
require_once('model/LogManager.php');
require_once('model/CommentManager.php');


class Frontend extends Manager
{
    private $_postmanager;
    private $_logManager;
    private $_commentManager;

    public function __construct()
    {
        // initialisation
        $this->_postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $this->_logManager = new \OpenClassrooms\Blog\Model\LogManager();
        $this->_commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    }

    public function listPosts()
    {
        $posts = $this->_postManager->getPosts();
        require('view/frontend/listPostsView.php');
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



    public function seeOnePost($content)
    {
        $post = $this->_postManager->getPost($content);
        $comments = $this->_commentManager->getComments($content);

        require('view/frontend/postView.php');
    }


    public function sendText($content)
    {
        $this->_postManager->sendText($content);
        echo '<script>alert("Votre texte a bien été envoyé");</script>';

        require('view/frontend/tinymceView.php');
    }

    public function displaySendText()
    {
        require('view/frontend/tinymceView.php');
    }



    public function addComment($postId, $author, $comment)
    {
        $this->_commentManager->postComment($postId, $author, $comment);
        echo '<script>alert("Votre commentaire a bien été envoyé");</script>';
        // after the add, display the post with the comments (including the new one)
        $post = $this->_postManager->getPost($postId);
        $comments = $this->_commentManager->getComments($postId);

        require('view/frontend/postView.php');
    }


    public function displayAddComment()
    {
        require('view/frontend/logView.php');
    }
}