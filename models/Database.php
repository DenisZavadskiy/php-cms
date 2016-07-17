<?php

class Database
{
    private $conn = null;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '12345678');
        $this->conn->select_db('news');
    }

    public function getCountArticles() {
        return mysqli_query($this->conn, "select count(*) as count_artcls from article");
    }
    

    public function getAllArticles($start, $per_page) {
        return mysqli_query($this->conn, "select article.*, count(comments.id) as count_comments from article 
                                            left join comments on article.id = comments.article_id
                                            group by article.id
                                            order by date desc
                                            limit $start, $per_page");
    }
    
    public function getAllComments($id) {
        return mysqli_query($this->conn, "select * from comments where article_id = $id order by date desc");
    }
    
    public function getOneArticle($id) {
        return mysqli_query($this->conn, "select * from article where id = $id");
    }

    public function insertArticle() {
        $ins = mysqli_prepare($this->conn, "insert into article(title, content) value (?, ?)");
        $ins->bind_param("ss", $_POST['title'], $_POST['content']);

        if($ins->execute()){
            return true;
        }
        return false;
    }
    
    public function insertComment() {
        $ins = mysqli_prepare($this->conn, "insert into comments(article_id, author, content) value (?, ?, ?)");
        $ins->bind_param("iss", $_POST['article_id'], $_POST['author'], $_POST['comment']);

        if($ins->execute()){
            return true;
        }
        return false;
    }

    public function deleteArticle($id) {
        mysqli_query($this->conn, "delete from article where id = $id");
    }

    public function deleteComment($id) {
        mysqli_query($this->conn, "delete from comments where id = $id");
    }
    
    public function updateArticle() {
        $ins = mysqli_prepare($this->conn, "update article set title = ?, content = ? where id = ?");
        $ins->bind_param("ssi", $_POST['title'], $_POST['content'], $_POST['id']);

        if($ins->execute()){
            return true;
        }
        return false;
    }
}