<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $comments->execute(array($postId, $author, $comment));
    }


    public function reportComment($id)
    {
        $db = $this->dbConnect();
        $repoComments = $db->prepare('UPDATE comments SET reported = 1  WHERE id = ?');
        $repoComments->execute(array($id));
    }


    public function getRepComments()
    {
        $db = $this->dbConnect();
        $repoComments = $db->query('SELECT id, author, comment FROM comments WHERE reported = 1');
        
        return $repoComments;
    }

    public function getRepComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id FROM comments WHERE id = ?');
        $req->execute(array($id));
        $repoComment = $req->fetch();
        return $repoComment;
    }


    public function deleteRepComFromPage($id)
    {
        $db = $this->dbConnect();
        $repoComment = $db->prepare('UPDATE comments SET reported = 0 WHERE id = ?');
        $repoComment->execute(array($id));

    }

    public function deleteCom($id)
    {
        $db = $this->dbConnect();
        $repoComment = $db->prepare('DELETE FROM comments WHERE id = ?');
        $repoComment->execute(array($id));
    }
}