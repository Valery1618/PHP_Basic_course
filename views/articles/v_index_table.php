

<main>
<h1>Articles</h1>
    <hr>
    <a href="<?=BASE_URL?>">View as list</a>
    <hr>
<table>
    <?php foreach($articles as $article): ?>
        <div class="article">
            <h2><?=$article['title']?></h2>
            <a href="<?=BASE_URL?>article/<?=$article['id']?>">Read more</a>
        </div>
    <?php endforeach; ?>
</table>
</main>


