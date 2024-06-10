
<ul class="list-group">
    <?php foreach ($categories as $category) { ?>
    <li class="list-group-item">
        <a href="<?=BASE_URL?>category/<?=$category['id']?>"><?=$category['title']?></a>
    </li>
    <?php } ?>
</ul>

<hr>
<a href="<?=BASE_URL?>">Move to main page</a>
