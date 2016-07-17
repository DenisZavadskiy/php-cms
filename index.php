<?php
session_start();
require ("models/Database.php");
require ("controllers/ArticlesController.php");
require ("controllers/CommentController.php");
require ("controllers/LoginController.php");

$act = isset($_GET["act"]) ? $_GET["act"] : "list";
$db = new Database();

define("IS_ADMIN", isset($_SESSION["IS_ADMIN"]));

switch($act) {
    case "list":
        ArticlesController::getList();
        break;
    case "view-article":
        ArticlesController::getOne();
        break;
    case "login":
        require("templates/login.php");
        break;
    case "do-login":
        LoginController::login();
        break;
    case "logout":
        LoginController::logout();
        break;
    case "add-article-view":
        ArticlesController::add_article_view();
        break;
    case "add-article":
        ArticlesController::add_article();
        break;
    case "add-comment":
        CommentController::add_comment();
        break;
    case "delete-article":
        ArticlesController::delete_article();
        break;
    case "delete-comment":
        CommentController::delete_comment();
        break;
    case  "edit-article-view":
        ArticlesController::edit_article_view();
        break;
    case "edit-article":
        ArticlesController::edit_article();
        break;
    default: 
        echo "No such action controller";
        break;
}

