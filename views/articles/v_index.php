
<main>
    <h1>Articles</h1>
    <hr>
    <?php if(isset($alertAdded) && $alertAdded === true){ ?>
    <div class="alert alert-success">
        Your article was added
    </div>
    <hr>
    <?php } ?>
    <a href="<?=BASE_URL?>?view=table">View as table</a>
    <hr>
    <div class="articles">
        <?php foreach($articles as $article){ ?>
            <div class="article">
                <h2><?=$article['title']?></h2>
                <a href="<?=BASE_URL?>article/<?=$article['id']?>">Read more</a>
            </div>
        <?php } ?>
    </div>
</main>





