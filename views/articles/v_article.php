<div class="content">
    <div><a href="<?=BASE_URL?>category/<?=$article['category_id']?>"><?=$article['category_title']?></a></div>
    <div class="article">
        <div><?=$article['content']?></div>
        <hr>
        <a href="<?=BASE_URL?>edit/<?=$article['id']?>">Edit</a>
        <a href="<?=BASE_URL?>delete/<?=$article['id']?>">Remove</a>
    </div>
</div>
<hr>
<a href="<?=BASE_URL?>">Move to main page</a>