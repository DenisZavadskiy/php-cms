<?php require("header.php")?>

    <article class="article-container">
        <div class="article-inner">
            <h1><?=$row['title']?></h1>
            <p class="date"><?=$row['date']?></p>
            <p class="content"><?=$row['content']?></p>
            <form action="?act=add-comment" class="adding-form form-comment" method="post">
                <input type="hidden" name="article_id" value="<?=$id?>">
                <input type="text"  name="author" placeholder="author"  required>
                <textarea placeholder="comment" name="comment" required></textarea>
                <button type="submit">Add comment</button>
            </form>
            <h3>Comments:</h3>
            <?php require ("comments.php") ?>
        </div>
    </article>
<?php require("footer.php")?>