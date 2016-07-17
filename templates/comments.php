<?php foreach ($comments as $comm): ?>
    <article>
        <span><?=$comm['author']?></span>
        <span class="del-comm-icon">
            <?php if(IS_ADMIN == true): ?>
                <a href="?act=delete-comment&article_id=<?=$row['id']?>&id=<?=$comm['id']?>"><i class="material-icons">delete</i></a>
            <?php endif?>
        </span>
        <p class="date"><?=$comm['date']?></p>
        <p class="content"><?=$comm['content']?></p>
    </article>
<?php endforeach; ?>