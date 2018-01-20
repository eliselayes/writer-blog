<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, SUBSTRING(content, 1, 150) AS short_content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT 0, 5');

        return $req;
    }
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($_GET['id']));
        $post = $req->fetch();

        return $post;
    }

    public function sendText($content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(content, date_creation) VALUES(?, NOW())');
        $posts->execute(array($content));
    }
}
