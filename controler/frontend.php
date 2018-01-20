<?php

// Chargement des classes

require_once('model/PostManager.php');
require_once('model/LogManager.php');




function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function seeOnePost($content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $post = $postManager->getPost($content);
    require('view/frontend/postView.php');
}

function sendText($content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $postManager->sendText($content);
    echo '<script>alert("Votre texte a bien été envoyé");</script>';

    require('view/frontend/tinymceView.php');
}

function login($pseudo, $pass)
{
    $logManager = new \OpenClassrooms\Blog\Model\LogManager();
    $logManager->login($pseudo, $pass);

    require('view/frontend/logView.php');
}

function displayLogin()
{
    require('view/frontend/logView.php');
}

function displaySendText()
{
    require('view/frontend/tinymceView.php');
}

