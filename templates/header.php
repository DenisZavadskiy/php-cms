<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>#GooDNews</title>
    <link href="<? __DIR__ ?>css/style.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav>
    <div class="container">
        <b><a href=".">#GooDNews</a></b>
        <ul class="navbar-nav">
            <li><a href=".">Home</a></li>
            <li><?php if(IS_ADMIN): ?>
                    <a href="?act=logout">Admin(Logout)</a>
                <?php else: ?>
                    <a href="?act=login">Login</a>
                <? endif; ?>
            </li>
        </ul>
    </div>
</nav>

<div class="aritcles-container">
