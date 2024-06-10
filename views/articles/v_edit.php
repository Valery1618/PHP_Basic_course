
<div class="form">
    <?php if(isset($isEdit) && $isEdit === true) { ?>
        <p>Статья отредактирована!</p>
    <?php }?>
    <form method="post">
        Category:
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?=$category['id']?>"
                    <?=($category['id'] == $fields['category_id'] ? 'selected' : '') ?>
                >
                    <?=$category['title']?>
                </option>
            <?php endforeach; ?>
        </select><br>
        Title:<br>
        <input type="text" name="title" value="<?=!empty($post['title']) ? $post['title'] : ''?>"><br>
        Content:<br>
        <input type="text" name="content" value="<?=!empty($post['content']) ? $post['content'] : ''?>"><br>
        <button>Edit</button>
        <input type="hidden" name="id" value="<?=$post['id']?>">
        <div class="error-list">
            <?php foreach ($validateErrors as $error): ?>
                <p><?=$error?></p>
            <?php endforeach; ?>
        </div>
    </form>
</div>

<hr>
<a href="<?=BASE_URL?>">Move to main page</a>
