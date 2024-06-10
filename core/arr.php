<?php
/*
 $target - one-dimensional array 99% associative
 $fields - regular array,contains a list of strings with fields
 */
function extractFields(array $target, array $fields) : array
{
    $res = [];

    foreach ($fields as $field){
        $res[$field] = trim($target[$field]);
    }
    return $res;
}
