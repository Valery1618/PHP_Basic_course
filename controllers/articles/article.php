<?php


$id = (int)URL_PARAMS['id'];
// TO DO: CheckId-> /^[1-9]+\d*/

$article = idIsValid($id) ? getArticle((int)$id) : null;

if ($article){
    $menu = template('articles/v_article_menu');
    $content = template('articles/v_article', [
        'article' => $article
    ]);

    $pageTitle = $article['title'];
    $pageContent = template('base/v_con2col', [
        'article' => $article,
        'left' => $menu,
        'title' => $pageTitle,
        'content' => $content
    ]);

}else{
    header('HTTP/1.1 404 Not Found');
    $pageContent = template('errors/v_404');
}



