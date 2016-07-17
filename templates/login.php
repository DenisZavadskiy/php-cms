<?php require("header.php")?>

    <article class="article-container">
        <div class=" article-inner">
            <h2>Please sign in</h2>
            <form class="login adding-form" role="form" action="?act=do-login" method="post">
                <input type="text" name="login" placeholder="Login" required autofocus>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign in</button>
            </form>
        </div>
    </article>

<?php require("footer.php")?>