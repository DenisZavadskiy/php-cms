<?php require("header.php")?>

<?php foreach ($records as $row): ?>
    <article class="article-container">
        <div class="article-inner">
            <div class="edit-article-icons">
                <?php if(Iedit-S_ADMIN == true): ?>
                    <a href="?act=article-view&id=<?=$row['id']?>"><i class="material-icons">mode_edit</i></a>
                    <a href="?act=delete-article&id=<?=$row['id']?>"><i class="material-icons">delete</i></a>
                <?php endif; ?>
            </div>
            <h1><a href="?act=view-article&id=<?=$row['id']?>"><?=$row['title']?></a></h1>
            <p class="date"><?=$row['date']?></p>
            <p class="content"><?=mb_substr($row['content'], 0, 200, 'UTF-8') . "..."?></p>
            <p class="comment-icon">
                <a href="?act=view-article&id=<?=$row['id']?>"><?=$row['count_comments']?>
                    <i class="tiny material-icons">chat_bubble_outline</i>
                </a>
            </p>
        </div>
    </article>
<?php endforeach; ?>

<div class="pages">
    <? while ($page++ < $num_pages): ?>
        <div class="page">
            <? if ($page == $cur_page): ?>
                <b><?=$page?></b>
            <? else: ?>
                <a href="?page=<?=$page?>"><?=$page?></a>
            <? endif ?>
        </div>
    <? endwhile ?>
</div>

<div class="add-artcl-btn">
    <?php if(IS_ADMIN == true): ?>
        <a href="?act=add-article-view" class="add-article">Add Article</a>
    <?php endif; ?>
</div>

<?php require("footer.php")?>