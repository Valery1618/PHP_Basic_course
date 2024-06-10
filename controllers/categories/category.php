<?php

$id = URL_PARAMS['id'];
$articles = idIsValid($id) ? getArticlesByCategory($id) : null;

if($articles){

$menu = template('categories/v_category_menu', [
    'categories' => getAllCategories()
]);

$content = template('categories/v_category', [
    'articles' => $articles
]);

$pageTitle = 'Статьи категории:';
$pageContent = template('base/v_con2col', [
    'content' => $content,
    'left' => $menu,
    'articles' => $articles,
    'title' => $pageTitle
]);
}else {
    header('HTTP/1.1 404 Not Found');
    $pageContent = template('errors/v_404');
}