<?php

$categories = getAllCategories();

$isEdit = false;
$err = '';

$id = (int)URL_PARAMS['id'];

if (empty($id)) {
    echo 'id статьи не передан';
    return false;
}

//$post = idIsValid($id) ? getArticle((int)$id) : null;
$post = getArticle((int) $id);

if (empty($post)){
    echo 'Статья не найдена';
    return false;
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fields = extractFields($_POST, ['id', 'title', 'content', 'category_id']);
    $validateErrors = articlesValidate($fields);

    if(empty($validateErrors)){
        editArticle($fields);
        $isEdit = true;
        $url = "http://localhost/lavrik/hw_4_directory/?c=article&id={$post['id']}";
        header("Location: $url");
    }
}else{
    $fields = ['title' => '', 'content' => '', 'category_id' => 0];
    $validateErrors =[];
}


//include("views/v_edit.php");
$pageTitle = 'Edit articles';
$pageContent = template('articles/v_edit', [
    'fields' => $fields,
    'validateErrors' => $validateErrors,
    'categories' => $categories,
    'post' => $post
]);
