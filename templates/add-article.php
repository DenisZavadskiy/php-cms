<?php require("header.php")?>

    <article class="article-container">
        <div class="article-inner">
            <h2>Add Article</h2>
            <form action="?act=add-article" class="adding-form form-article" method="post">
                <input type="text" name="title" placeholder="title" required>
                <textarea placeholder="content" name="content" rows="20" required></textarea>
                <button type="submit">Add Article</button>
            </form>
        </div>
    </article>

<?php require("footer.php")?>
