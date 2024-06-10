<main>
    <div class="articles">
        <?php foreach($articles as $article){?>
            <div class="article">
                <h2><?=$article['article_title']?></h2>
                <a href="<?=BASE_URL?>article/<?=$article['article_id']?>">Read more</a>
            </div>
        <?php } ?>
    </div>
</main>