<?php

$id = (int)URL_PARAMS['id'];

$res = removeArticle($id);


//include("views/v_delete.php");
$pageTitle = 'Delete articles';
$pageContent = template('articles/v_delete', [
    'res' => $res
]);