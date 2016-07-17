<?php
class ArticlesController
{
    public static function getList () {
        $per_page = 5;
        $count_artcls = mysqli_fetch_assoc($GLOBALS['db']->getCountArticles())['count_artcls'];
        $cur_page = 1;

        if (isset($_GET['page']) && $_GET['page'] > 0)
        {
            $cur_page = $_GET['page'];
        }
        $start = ($cur_page - 1) * $per_page;

        $select = $GLOBALS['db']->getAllArticles($start, $per_page);
        $records = array();

        while($row = mysqli_fetch_assoc($select)){
            $records[] = $row;
        }

        $num_pages = ceil($count_artcls / $per_page);
        $page = 0;
        require("templates/list.php");
    }
    
    public static function getOne() {
        $id = intval($_GET['id']);
        $comments = array();
        $select = $GLOBALS['db']->getAllComments($id);
        $row = mysqli_fetch_assoc($GLOBALS['db']->getOneArticle($id));

        if($row) {
            while($cmnt = mysqli_fetch_assoc($select)){
                $comments[] = $cmnt;
            }
            require("templates/article.php");
        }
        else {
            header("Location: .");
        }
    }

    public static function add_article_view() {
        if(isset($_SESSION['IS_ADMIN'])){
            require("templates/add-article.php");
        }
    }

    public static function add_article() {
        if($GLOBALS['db']->insertArticle())
            header("Location: .");
    }

    public static function delete_article() {
        if(isset($_SESSION['IS_ADMIN'])) {
            $id = intval($_GET['id']);
            $GLOBALS['db']->deleteArticle($id);
            header("Location: .");
        }
    }

    public static function edit_article_view() {
        if(isset($_SESSION['IS_ADMIN'])){
            $id = intval($_GET['id']);
            $row = mysqli_fetch_assoc($GLOBALS['db']->getOneArticle($id));
            require("templates/edit-article-view.php");
        }
    }

    public static function edit_article() {
        if($GLOBALS['db']->updateArticle())
            header("Location: .");
    }
}