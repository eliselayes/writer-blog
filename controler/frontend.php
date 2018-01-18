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

/*function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $post = $postManager->getPost($_GET['id']);
    require('view/frontend/postView.php');
}*/

function sendText($content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $postManager->sendText($content);

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

