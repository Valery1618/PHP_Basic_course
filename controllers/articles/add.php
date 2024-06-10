<?php

if (isset($user) === null){
    header('Location: ' . BASE_URL . 'auth/login');
    exit();
}

$categories = getAllCategories();

$isSend = false;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = extractFields($_POST, ['title', 'content', 'category_id']);
    $validateErrors = articlesValidate($fields);


    if (empty($validateErrors)) {
        articleAdd($fields);
        $_SESSION['articles.added'] = true;
        $lastInsertId = lastInsertId();
        $url = "http://localhost/lavrik/hw_4_directory/?c=article&id={$lastInsertId}";
        header("location: $url");
        exit();
    }
}else{
        $fields = ['title' => '', 'content' => '', 'category_id' => 0];
        $validateErrors =[];
    }



$pageTitle = 'Add articles';
$pageContent = template('articles/v_add', [
    'fields' => $fields,
    'validateErrors' => $validateErrors,
    'categories' => $categories
]);
