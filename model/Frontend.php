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

    public function listPosts1()
    {
        //$currentPage = 1;
        $posts = $this->_postManager->getPosts();
        //$totalpages = $this->_postManager->nbpagesCount();
        require('view/frontend/listPostsView.php');

        //return $totalpages;
    }

    /*public function listPostsOtherPages()
    {
        $currentPage = $_GET['p'];
        $posts = $this->_postManager->getPosts();
        //$totalpages = $this->_postManager->nbpagesCount();
        require('view/frontend/listPostsView.php');

        return $totalpages;
    }*/




    public function seeOnePost($content)
    {
        $post = $this->_postManager->getPost($content);
        $comments = $this->_commentManager->getComments($content);

        require('view/frontend/postView.php');
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



    public function addReport($id, $postId)
    {
        $this->_commentManager->reportComment($id);
        echo '<script>alert("Le commentaire a bien été signalé");</script>';

        $post = $this->_postManager->getPost($postId);
        $comments = $this->_commentManager->getComments($postId);

        require('view/frontend/postView.php');
    }

}