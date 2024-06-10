<?php
function userById(string $id): ?array{
    $sql = "SELECT id, login, email, name FROM users WHERE id = :id";
    $query = dbQuery($sql, ['id' => $id]);
    $user = $query->fetch();
    return  $user === false ? null : $user;
}

function userOne(string $login): ?array{
    $sql = "SELECT id, password FROM users WHERE login = :login";
    $query = dbQuery($sql, ['login' => $login]);
    $user = $query->fetch();
    return  $user === false ? null : $user;
}