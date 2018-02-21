<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId) {
        $sql = 'SELECT id, author, comment, reported, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
        $comments = $this->executeRequest($sql, array($postId));
        return $comments;
    }

    public function postComment($postId, $author, $comment) {
        $sql = 'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())';
        $comments = $this->executeRequest($sql, array($postId, $author, $comment));
    }

    public function reportComment($id) {
        $sql = 'UPDATE comments SET reported = 1  WHERE id = ?';
        $repoComments = $this->executeRequest($sql, array($id));
    }

    public function getRepComments() {
        $sql = 'SELECT id, author, comment FROM comments WHERE reported = 1';
        $repoComments = $this->executeRequest($sql);
        return $repoComments;
    }

    public function deleteRepComFromPage($id) {
        $sql = 'UPDATE comments SET reported = 0 WHERE id = ?';
        $repoComment = $this->executeRequest($sql, array($id));
    }

    public function deleteCom($id) {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $repoComment = $this->executeRequest($sql, array($id));
    }
}