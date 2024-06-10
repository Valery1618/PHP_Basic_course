<?php

include_once ('core/db.php');

function getAllArticles(): array
{
    $sql = "SELECT * FROM articles ORDER BY date_create DESC";
    $query= dbQuery($sql);
    return $query->fetchAll();
}

function getArticle(int $id){
    $sql = "SELECT a.id, a.title, a.content, a.date_create, c.id as category_id, c.title as category_title
                FROM articles a 
                INNER JOIN categories c on a.category_id = c.id 
                WHERE a.id = :id";
    $query = dbQuery($sql, ['id' => $id]);

    $result = $query->fetch();

    return  $result;
}

function getAllCategories(): array
{
    $sql = "SELECT * FROM categories";
    $query= dbQuery($sql);
    return $query->fetchAll();
}

function getArticlesByCategory(int $id): array
{
    $sql = "SELECT a.id as article_id,a.title as article_title,a.content, a.date_create
                FROM articles a
                INNER JOIN categories c ON a.category_id = c.id
                WHERE c.id = :id ";
    $query = dbQuery($sql, ['id' => $id]);
    return $query->fetchAll();
}


function articleAdd(array $fields) : bool{
    $sql = "INSERT INTO articles (title, content, category_id) VALUES (:title, :content, :category_id)";
    dbQuery($sql, $fields);
    return true;
}

function removeArticle(int $id) : bool{
    $sql = "DELETE FROM articles WHERE id = :id";
    dbQuery($sql, ['id' => $id]);
    return true;
}

function editArticle(array $fields): bool
{
    $sql = "UPDATE articles SET title = :title, content = :content, category_id = :category_id WHERE id = :id";
    dbQuery($sql, $fields);
    return true;
}
/* function editArticle(int $id, array $fields): bool
{
    $fields['id'] = $id;
    $sql = "UPDATE articles SET title = :title, content = :content, category_id = :category_id WHERE id = :id";
    dbQuery($sql, $fields);
    return true;
} */

/* function editArticle(int $id, string $title, string $content, int $category_id): bool
{
    $sql = "UPDATE articles SET title = :title, content = :content, category_id = :category_id WHERE id = :id";
    $params = [':title' => $title, ':content' => $content, ':category_id' => $category_id, ':id' => $id];
    dbQuery($sql, $params);
    return true;
} */

function idIsValid(string $id) :bool
{
        return (bool)preg_match('/^[1-9]+\d*/', $id);
}
function articlesValidate(array &$fields) : array
{
    $errors = [];
    $textLen = mb_strlen($fields['content'], 'UTF-8');

    if (mb_strlen($fields['title'], 'UTF-8') < 2){
        $errors[] = 'Название не короче двух символов!';
    }

    if ($textLen < 10 || $textLen > 140){
        $errors[] = 'Текст от 10 до 140 символов!';
    }
    $fields['title'] = htmlspecialchars($fields['title']);
    $fields['content'] = htmlspecialchars($fields['content']);

    return $errors;
}







    /*  $articles = getArticles();
    if(isset($articles[$id])){
        $articles[$id]['title'] = $title;
        $articles[$id]['content'] = $content;
        saveArticles($articles);
        return true;
    }
    return false;

    $articles = getAllArticles();
    if(!isset($articles[$id])) {
        return false;
    }

    $articles[$id] = [
        'id' => $id,
        'title' => $title,
        'content' => $content
    ];
    saveArticles($articles);
    return true;

}*/



