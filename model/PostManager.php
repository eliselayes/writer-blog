<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager {
    private $cPage;
    private $nbPostsPerPage = 5;

    public function getTotalPages() {
        $sql = 'SELECT COUNT(*) AS totalPosts FROM posts';
        $req = $this->executeRequest($sql);
        while ($data = $req->fetch()) {
            $totalPosts = $data['totalPosts'];
        }
        $totalPages = ceil($totalPosts / $this->nbPostsPerPage);
        return $totalPages;
    }

    public function getCPage($page) {
        $totalPages = $this->getTotalPages();
        $this->cPage = intval($page);
        return $this->cPage;
    }

    public function getPosts() {
        $limit = ($this->cPage - 1)*$this->nbPostsPerPage;
        $sql = 'SELECT id, SUBSTRING(content, 1, 250) AS short_content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT ' . $limit . ',' . $this->nbPostsPerPage;
        $req = $this->executeRequest($sql);
        return $req;
    }

    public function getPost($postId) {
        $sql = 'SELECT id, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?';
        $req = $this->executeRequest($sql, array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function sendText($content) {
        $sql = 'INSERT INTO posts(content, date_creation) VALUES(?, NOW())';
        $req = $this->executeRequest($sql, array($content));
        $posts = $req->fetch();
    }

    public function getMonths() {
        $sql = 'SELECT MONTH(date_creation) AS m, 
        CASE WHEN MONTH(date_creation) = 1 THEN \'janvier\' 
        WHEN MONTH(date_creation) = 2 THEN \'février\' 
        WHEN MONTH(date_creation) = 3 THEN \'mars\' 
        WHEN MONTH(date_creation) = 4 THEN \'avril\'
        WHEN MONTH(date_creation) = 5 THEN \'mai\'
        WHEN MONTH(date_creation) = 6 THEN \'juin\'
        WHEN MONTH(date_creation) = 7 THEN \'juillet\'
        WHEN MONTH(date_creation) = 8 THEN \'août\'
        WHEN MONTH(date_creation) = 9 THEN \'septembre\'
        WHEN MONTH(date_creation) = 10 THEN \'octobre\'
        WHEN MONTH(date_creation) = 11 THEN \'novembre\'
        WHEN MONTH(date_creation) = 12 THEN \'décembre\'  
        END AS mois, 
        YEAR(date_creation) AS y FROM posts GROUP BY y, m';
        $months = $this->executeRequest($sql);
        return $months;
    }

    public function getPostsPerMonth($m) {
        $sql = 'SELECT id, SUBSTRING(content, 1, 150) AS short_content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE MONTH(date_creation) = ? ORDER BY id DESC';
        $postsPerMonth = $this->executeRequest($sql, array($m));
        return $postsPerMonth;
    }

    public function deletePost($id) {
        $sql = 'DELETE FROM posts WHERE id = ?';
        $postToBeDel = $this->executeRequest($sql, array($id));
    }

    public function modifyPost($content, $id) {
        $sql = 'UPDATE posts SET content = ? WHERE id = ?';
        $postToBeMod = $this->executeRequest($sql, array($content, $id));
    }
}