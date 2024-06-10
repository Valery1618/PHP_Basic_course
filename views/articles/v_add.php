<div class="form">
    <?php if(isset($isSend) && $isSend === true): ?>
        <p>Статья добавлена!</p>
    <?php else: ?>
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
            <input type="text" name="title" value="<?=$fields['title']?>"><br>
            Content:<br>
            <input type="text" name="content" value="<?=$fields['content']?>"><br>
            <button>Send</button>
            <div class="error-list">
                <?php foreach ($validateErrors as $error){ ?>
                    <p><?=$error?></p>
                <?php } ?>
            </div>
        </form>
    <?php endif; ?>
</div>

<hr>
<a href="<?=BASE_URL?>">Move to main page</a>



