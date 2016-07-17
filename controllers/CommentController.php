<?php

class CommentController
{
    public static function add_comment() {
        if($GLOBALS['db']->insertComment())
            header("Location: ?act=view-article&id=" . intval($_POST['article_id']));
    }

    public static function delete_comment() {
        if(isset($_SESSION['IS_ADMIN'])) {
            $id = intval($_GET['id']);
            $GLOBALS['db']->deleteComment($id);
            header("Location: ?act=view-article&id=" . intval($_GET['article_id']));
        }
    }
}