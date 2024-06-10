<?php

$articles = getAllArticles();
$isTable = ($_GET['view'] ?? '') === 'table'; // all.php?view=table
$template = $isTable ? 'v_index_table' : 'v_index';

$alertAdded = false;
if(isset($_SESSION['articles.added'])){
    $alertAdded = true;
    unset($_SESSION['articles.added']);
}

$pageTitle = 'All articles';
$pageContent = template("articles/$template", [
    'articles' => $articles,
    'alertAdded' => $alertAdded
]);



