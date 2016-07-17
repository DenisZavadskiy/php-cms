<?php require("header.php")?>

    <article class="article-container">
        <div class="article-inner">
            <form action="?act=edit-article" class="adding-form form-article" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="text" name="title" placeholder="title" value="<?=$row['title']?>" required>
                <textarea placeholder="content" name="content" rows="20" required><?=$row['content']?>"</textarea>
                <button type="submit">Edit Article</button>
            </form>
        </div>
    </article>

<?php require("footer.php")?>